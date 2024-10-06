<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\CoreMonitoring\FormBuilder\Models\Field;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\CreateDefaultFieldTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFieldTypeByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFormByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\GenerateFormSchemaFrontTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\UpdateFormTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

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
        $sanitizedData = $request->sanitizeInput([

        ]);

        $field = $this->findFieldTypeByIdTask->run($request->field_type_id);

        $form = $this->findFormByIdTask->run($request->id);

        $field = $this->createDefaultFieldTask->run($field, $form->id);

        // UPDATE FORM
        $data = ['form_schema_web' => json_encode($this->generateFormSchemaFrontTask->run($form->id))];
        $this->updateFormTask->run($data, $form->id);

        return $field;
    }
}
