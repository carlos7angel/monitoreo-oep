<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\DeleteFieldFormTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFieldByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFormByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\GenerateFormSchemaFrontTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\GetFieldsByFormTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\UpdateFormTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DeleteFieldFormAction extends ParentAction
{
    public function __construct(
        private FindFormByIdTask $findFormByIdTask,
        private FindFieldByIdTask $findFieldByIdTask,
        private DeleteFieldFormTask $deleteFieldFormTask,
        private UpdateFormTask $updateFormTask,
        private GenerateFormSchemaFrontTask $generateFormSchemaFrontTask,
        private GetFieldsByFormTask $getFieldsByFormTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request)
    {
        $sanitizedData = $request->sanitizeInput($request->all());

        $form = $this->findFormByIdTask->run($request->id);
        $field = $this->findFieldByIdTask->run($request->field_id);

        return DB::transaction(function () use ($form, $field, $request) {

            $this->deleteFieldFormTask->run($field->id);

            // UPDATE SORT FIELDS
            $fields = $this->getFieldsByFormTask->run($form->id);
            $sort = 0;
            foreach ($fields as $field) {
                $field->order =  $sort;
                $sort = $sort + 1;
                $field->save();
            }

            // UPDATE FORM
            $data = ['form_schema_web' => json_encode($this->generateFormSchemaFrontTask->run($form->id))];
            $this->updateFormTask->run($data, $form->id);

            // Add Log
            App::make(Dispatcher::class)->dispatch(new AddActivityLogEvent(LogConstants::DELETE_FORM_FIELD, $request->server(), $field));
        });
    }
}
