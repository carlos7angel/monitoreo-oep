<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\DeleteFieldFormTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFieldByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFormByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\GenerateFormSchemaFrontTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\UpdateFormTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class DeleteFieldFormAction extends ParentAction
{
    public function __construct(
        private FindFormByIdTask $findFormByIdTask,
        private FindFieldByIdTask $findFieldByIdTask,
        private DeleteFieldFormTask $deleteFieldFormTask,
        private UpdateFormTask $updateFormTask,
        private GenerateFormSchemaFrontTask $generateFormSchemaFrontTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request)
    {
        $sanitizedData = $request->sanitizeInput([

        ]);

        $form = $this->findFormByIdTask->run($request->id);
        $field = $this->findFieldByIdTask->run($request->field_id);

        $this->deleteFieldFormTask->run($field->id);

        // UPDATE FORM
        $data = ['form_schema_web' => json_encode($this->generateFormSchemaFrontTask->run($form->id))];
        $this->updateFormTask->run($data, $form->id);
    }
}
