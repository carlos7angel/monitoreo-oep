<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\CoreMonitoring\FormBuilder\Models\Field;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\CreateDefaultFieldTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFieldTypeByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFormByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\GenerateFormSchemaFrontTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\UpdateFormTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class CreateFieldFormAction extends ParentAction
{
    public function __construct(
        private FindFieldTypeByIdTask $findFieldTypeByIdTask,
        private FindFormByIdTask $findFormByIdTask,
        private CreateDefaultFieldTask $createDefaultFieldTask,
        private UpdateFormTask $updateFormTask,
        private GenerateFormSchemaFrontTask $generateFormSchemaFrontTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request): Field
    {
        $sanitizedData = $request->sanitizeInput($request->all());

        $field = $this->findFieldTypeByIdTask->run($request->field_type_id);
        $form = $this->findFormByIdTask->run($request->id);

        return DB::transaction(function () use ($form, $field, $request) {

            $field = $this->createDefaultFieldTask->run($field, $form->id);

            // UPDATE FORM
            $data = ['form_schema_web' => json_encode($this->generateFormSchemaFrontTask->run($form->id))];
            $this->updateFormTask->run($data, $form->id);

            // Add Log
            App::make(Dispatcher::class)->dispatch(new AddActivityLogEvent(LogConstants::ADD_FORM_FIELD, $request->server(), $field));

            return $field;

        });
    }
}
