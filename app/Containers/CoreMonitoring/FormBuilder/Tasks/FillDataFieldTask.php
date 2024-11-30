<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Tasks;

use App\Containers\CoreMonitoring\FormBuilder\Models\Field;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FillDataFieldTask extends ParentTask
{
    public function run(Field $field, Request $request): mixed
    {
        $data = [
            'unique_fieldname' => $request->fieldname
        ];

        switch ($field->fieldType->type) {
            case 'textbox':
                $data['label'] = $request->label;
                $data['placeholder'] = $request->placeholder;
                $data['tooltip'] = $request->tooltip;
                $data['alias'] = $request->alias;

                $data['field_subtype'] = $request->subtype;
                $data['default_value'] = $request->defaultvalue;

                $data['required'] = (isset($request->required) && $request->required);
                $data['minlength'] = isset($request->minlength) ? $request->minlength : null;
                $data['maxlength'] = isset($request->maxlength) ? $request->maxlength : null;
                $data['regex'] = $request->subtype == 'text' ? $request->regex : null;
                $data['readonly'] = (isset($request->readonly) && $request->readonly);
                $data['min'] = $request->subtype == 'digits' || $request->subtype == 'decimal' ? $request->min : null;
                $data['max'] = $request->subtype == 'digits' || $request->subtype == 'decimal' ? $request->max : null;

                $data['grid_column'] = $request->gridcolumn;
                $data['class_name'] = $request->classname;
                break;

            case 'hidden':
                $data['field_subtype'] = $request->subtype;
                $data['default_value'] = $request->defaultvalue;
                $data['required'] = (isset($request->required) && $request->required);

                break;

            case 'textarea':

                $data['label'] = $request->label;
                $data['placeholder'] = $request->placeholder;
                $data['tooltip'] = $request->tooltip;
                $data['alias'] = $request->alias;

                $data['field_subtype'] = $request->subtype;
                $data['default_value'] = $request->defaultvalue;

                $data['required'] = (isset($request->required) && $request->required);
                $data['minlength'] = isset($request->minlength) ? $request->minlength : null;
                $data['maxlength'] = isset($request->maxlength) ? $request->maxlength : null;
                $data['textarea_rows'] = $request->rows;
                $data['readonly'] = (isset($request->readonly) && $request->readonly);

                $data['grid_column'] = $request->gridcolumn;
                $data['class_name'] = $request->classname;
                break;

            case 'select':

                $options_json = null;
                if ($request->has('repeater_options')) {
                    $options = [];
                    $options_array =  $request->repeater_options;
                    foreach ($options_array as $key => $item) {
                        if (! empty($item['field_option']) && ! empty($item['field_value'])) {
                            $options[] = (object) array(
                                'text'      => $item['field_option'],
                                'value'     => $item['field_value'],
                                'selected'  => isset($item['field_selected']),
                            );
                        }
                    }
                    if (count($options) > 0) {
                        $options_json = json_encode($options);
                    }
                }

                $data['label'] = $request->label;
                $data['placeholder'] = $request->placeholder;
                $data['tooltip'] = $request->tooltip;
                $data['alias'] = $request->alias;

                $data['field_subtype'] = $request->subtype;
                $data['options_type'] = $request->optionstype;
                $data['options'] = $request->optionstype === 'custom' ? $options_json : $request->catalog ;
                $data['default_value'] = $request->defaultvalue;
                $data['select_search'] = (isset($request->search) && $request->search);
                $data['readonly'] = (isset($request->readonly) && $request->readonly);

                $data['required'] = (isset($request->required) && $request->required);

                $data['grid_column'] = $request->gridcolumn;
                $data['class_name'] = $request->classname;

                break;

            case 'checkbox':

                $options_json = null;
                if ($request->has('repeater_options')) {
                    $options = [];
                    $options_array =  $request->repeater_options;
                    foreach ($options_array as $key => $item) {
                        if (! empty($item['field_option']) && ! empty($item['field_value'])) {
                            $options[] = (object) array(
                                'text'      => $item['field_option'],
                                'value'     => $item['field_value'],
                                'selected'  => isset($item['field_selected']),
                            );
                        }
                    }
                    if (count($options) > 0) {
                        $options_json = json_encode($options);
                    }
                }

                $data['label'] = $request->label;
                $data['tooltip'] = $request->tooltip;
                $data['alias'] = $request->alias;

                $data['field_subtype'] = $request->subtype;
                $data['options_type'] = $request->optionstype;
                $data['options'] = $request->optionstype === 'custom' ? $options_json : $request->catalog ;
                $data['default_value'] = $request->defaultvalue;
                $data['readonly'] = (isset($request->readonly) && $request->readonly);

                $data['required'] = (isset($request->required) && $request->required);

                $data['grid_column'] = $request->gridcolumn;
                $data['class_name'] = $request->classname;

                break;

            case 'datepicker':
                $data['label'] = $request->label;
                $data['placeholder'] = $request->placeholder;
                $data['tooltip'] = $request->tooltip;
                $data['alias'] = $request->alias;

                $data['field_subtype'] = $request->subtype;
                $data['default_value'] = $request->defaultvalue;
                $data['readonly'] = (isset($request->readonly) && $request->readonly);

                $data['required'] = (isset($request->required) && $request->required);

                $data['grid_column'] = $request->gridcolumn;
                $data['class_name'] = $request->classname;
                break;

            case 'fileupload':
                $data['label'] = $request->label;
                $data['placeholder'] = $request->placeholder;
                $data['tooltip'] = $request->tooltip;
                $data['alias'] = $request->alias;

                $data['field_subtype'] = $request->subtype;
                $data['file_maxsize'] = $request->maxsize;
                $data['file_mimetypes'] = $request->mimetypes != null ? json_encode($request->mimetypes) : null;

                $data['required'] = (isset($request->required) && $request->required);
                $data['maxfiles'] = $request->maxfiles;

                $data['grid_column'] = $request->gridcolumn;
                $data['class_name'] = $request->classname;
                break;

            case 'html':
                $data['text_html'] = $request->text;
                $data['tooltip'] = isset($request->tooltip) ? $request->tooltip : null;

                $data['field_subtype'] = $request->subtype;
                $data['title_heading'] = isset($request->heading) ? $request->heading : null;

                $data['grid_column'] = $request->subtype !== 'divider' ? $request->gridcolumn : null;
                $data['class_name'] = $request->classname;

                break;
        }

        // dd($data);
        return $data;
    }
}
