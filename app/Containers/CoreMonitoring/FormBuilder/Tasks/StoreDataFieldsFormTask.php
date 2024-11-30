<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Tasks;

use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateFileTask;
use App\Containers\CoreMonitoring\FormBuilder\Data\Repositories\FieldRepository;
use App\Containers\CoreMonitoring\FormBuilder\Models\Form;
use App\Containers\CoreMonitoring\Monitoring\Models\MonitoringItem;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;

class StoreDataFieldsFormTask extends ParentTask
{
    public function __construct(
        protected FieldRepository $repository,
    ) {
    }

    public function run(Form $form, Request $request, MonitoringItem $monitoring, $load = null): mixed
    {
        $input = $request->all();

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');
        $fields = app(GetFieldsByFormTask::class)->run($form->id);

        $data = [];
        foreach ($fields as $index => $field) {

            switch ($field->fieldType->type) {

                case 'textbox':
                case 'datepicker':
                case 'textarea':
                    $data[$field->unique_fieldname] = isset($input[$field->unique_fieldname]) ? $input[$field->unique_fieldname] : null;
                    break;
                case 'select':
                case 'checkbox':
                    $data[$field->unique_fieldname] = null;
                    $options = isset($input[$field->unique_fieldname]) ? $input[$field->unique_fieldname] : [];
                    if (is_array($options)) {
                        if ($field->field_subtype === 'select') {
                            $data[$field->unique_fieldname] = $options[0];
                        }
                        if ($field->field_subtype === 'multiselect') {
                            $data[$field->unique_fieldname] = json_encode($options);
                        }
                        if ($field->field_subtype === 'checkbox') {
                            $data[$field->unique_fieldname] = json_encode($options);
                        }
                    }
                    break;
                case 'fileupload':
                    $data[$field->unique_fieldname] = null;

                    if (isset($load[$field->unique_fieldname]) && is_array($load[$field->unique_fieldname])) {
                        $data[$field->unique_fieldname] = $load[$field->unique_fieldname];
                    }

                    if (isset($input[$field->unique_fieldname]) && $request->file($field->unique_fieldname)) {
                        $file = app(CreateFileTask::class)->run($request->file($field->unique_fieldname), 'monitoring', $monitoring->id, $user);
                        $data[$field->unique_fieldname] = [
                            'code' => $file->unique_code,
                            'original_name' => $file->origin_name,
                            'size' => $file->size,
                            'url_file' => $file->url_file,
                            'mime_type' => $file->mime_type,
                        ];
                    }
                    break;
            }
        }

        return $data;

    }
}
