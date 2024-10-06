<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\CoreMonitoring\FormBuilder\Models\Field;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\CreateDefaultFieldTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FillDataFieldTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFieldByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFieldTypeByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFormByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\GenerateFormSchemaFrontTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\UpdateFieldTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\UpdateFormTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class UpdateFieldFormAction extends ParentAction
{
    public function __construct(
        private FindFieldByIdTask $findFieldByIdTask,
        private UpdateFieldTask $updateFieldTask,
        private FindFormByIdTask $findFormByIdTask,
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
        $sanitizedData = $request->sanitizeInput([

        ]);

        $form = $this->findFormByIdTask->run($request->id);

        $field = $this->findFieldByIdTask->run($request->field_id);

        $data = app(FillDataFieldTask::class)->run($field, $request);

        $field = $this->updateFieldTask->run($data, $field->id);

        // UPDATE FORM
        $data = ['form_schema_web' => json_encode($this->generateFormSchemaFrontTask->run($form->id))];
        $this->updateFormTask->run($data, $form->id);

        return $field;
    }
}
