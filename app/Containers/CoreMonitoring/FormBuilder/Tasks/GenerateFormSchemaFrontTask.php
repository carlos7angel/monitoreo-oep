<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Tasks;

use App\Ship\Parents\Tasks\Task as ParentTask;

class GenerateFormSchemaFrontTask extends ParentTask
{
    public function __construct(
        protected GetFieldsByFormTask $getFieldsByFormTask,
    ) {
    }

    public function run($form_id): mixed
    {
        $fields = $this->getFieldsByFormTask->run($form_id);

        $schema = [];
        foreach ($fields as $index => $field) {

            $data = [];
            $field = (object)$field;
            switch ($field->field_type_name) {
                case 'textbox':

                    $data = [
                        'type' => $field->field_type_name,
                        'subtype' => $field->field_subtype,
                        'fieldname' => $field->unique_fieldname,
                        'label' => $field->label,
                        'placeholder' => $field->placeholder,
                        'tooltip' => $field->tooltip,
                        'alias' => $field->alias, //NEW

                        'defaultvalue' => $field->default_value,

                        'classname' => $field->class_name,
                        'gridcolumn' => $field->grid_column,

                        'required' => $field->required ? true : false,
                    ];

                    if($field->required) {
                        $data['validations'][] = (object)array('name' => 'required', 'value' => true, 'message' => 'Este campo es obligatorio.');
                    }

                    if ($field->minlength) {
                        $data['validations'][] = (object)array('name' => 'minlength', 'value' => $field->minlength, 'message' => 'Por favor, no escribas menos de ' . $field->minlength . ' caracteres.');
                    }

                    if ($field->maxlength) {
                        $data['validations'][] = (object)array('name' => 'maxlength', 'value' => $field->maxlength, 'message' => 'Por favor, no escribas más de ' . $field->maxlength . ' caracteres.');
                    }

                    if ($field->field_subtype == 'text' && $field->regex != null) {
                        $data['validations'][] = (object)array('name' => 'pattern', 'value' => $field->regex, 'message' => 'Por favor, escriba un formato de texto válido.');
                    }

                    if (($field->field_subtype == 'decimal' || $field->field_subtype == 'digits') && $field->min != null) {
                        $data['validations'][] = (object)array('name' => 'min', 'value' => $field->min, 'message' => 'Por favor, escribe un valor mayor o igual a '.$field->min.'.');
                    }

                    if (($field->field_subtype == 'decimal' || $field->field_subtype == 'digits') && $field->max != null) {
                        $data['validations'][] = (object)array('name' => 'max', 'value' => $field->max, 'message' => 'Por favor, escribe un valor menor o igual a '.$field->max.'.');
                    }

                    if ($field->field_subtype == 'url' && $field->type_url != null) {
                        if ($field->type_url == 'http') {
                            $data['validations'][] = (object)array('name' => 'pattern', 'value' => "^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})).?)(?::\d{2,5})?(?:[/?#]\S*)?$", 'message' => 'Por favor, escribe un formato de url válido.');
                        }
                        if ($field->type_url == 'no http') {
                            $data['validations'][] = (object)array('name' => 'pattern', 'value' => "^[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#%[\]@!\$&\'\(\)\*\+,;=.]+$", 'message' => 'Por favor, escribe un formato de url válido.');
                        }
                    }

                    if ($field->field_subtype == 'digits') {
                        $data['validations'][] = (object)array('name' => 'pattern', 'value' => "^\d+$", 'message' => 'Por favor, escribe un valor válido.');
                    }

                    if ($field->field_subtype == 'decimal') {
                        $data['validations'][] = (object)array('name' => 'pattern', 'value' => "^[0-9]+(\.[0-9]{1,2})?$", 'message' => 'Por favor, escribe un valor válido.');
                    }

                    if ($field->field_subtype == 'email') {
                        //$data['validations'][] = (object)array('name' => 'pattern', 'value' => '/regex para email/', 'message' => 'Por favor, escribe un correo electrónico válido.');
                        $data['validations'][] = (object)array('name' => 'email', 'value' => true, 'message' => 'Por favor, escribe un correo electrónico válido.');
                    }

                    if ($field->field_subtype == 'phone') {
                        $data['validations'][] = (object)array('name' => 'pattern', 'value' => "^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$", 'message' => 'Por favor, escribe un número de teléfono válido.');
                    }

                    if ($field->readonly != null && $field->readonly == true) {
                        $data['readonly'] = true;
                    }

                    if ($field->input_group_prepend) {
                        $data['prepend'] = json_decode($field->input_group_prepend);
                    }

                    if ($field->input_group_append) {
                        $data['append'] = json_decode($field->input_group_append);
                    }

                    if ($field->logic_condition) {
                        $data['conditionlogic'] = json_decode($field->logic_condition);
                    }

                    if ($field->automatic_calculation) {
                        //    $data['autocalculate'] = json_decode($field->automatic_calculation);
                    }

                    $config = array();
                    $data['config'] = (object)$config;

                    break;
                case 'textarea':

                    $data = [
                        'type' => $field->field_type_name,
                        'subtype' => $field->field_subtype,
                        'fieldname' => $field->unique_fieldname,
                        'label' => $field->label,
                        'placeholder' => $field->placeholder,
                        'tooltip' => $field->tooltip,
                        'alias' => $field->alias,

                        'defaultvalue' => $field->default_value,

                        'classname' => $field->class_name,
                        'gridcolumn' => $field->grid_column,

                        'required' => $field->required ? true : false,
                    ];

                    if ($field->required) {
                        $data['validations'][] = (object)array('name' => 'required', 'value' => true, 'message' => 'Este campo es obligatorio.');
                    }

                    if ($field->minlength) {
                        $data['validations'][] = (object)array('name' => 'minlength', 'value' => $field->minlength, 'message' => 'Por favor, no escribas menos de ' . $field->minlength . ' caracteres.');
                    }

                    if ($field->maxlength) {
                        $data['validations'][] = (object)array('name' => 'maxlength', 'value' => $field->maxlength, 'message' => 'Por favor, no escribas más de ' . $field->maxlength . ' caracteres.');
                    }

                    if ($field->readonly != null && $field->readonly == true) {
                        $data['readonly'] = true;
                    }

                    if ($field->logic_condition) {
                        $data['conditionlogic'] = json_decode($field->logic_condition);
                    }

                    $config = array();
                    $data['rows'] = 3;
                    if ($field->textarea_rows != null && $field->textarea_rows != 0) {
                        $data['rows'] = $field->textarea_rows;
                    }
                    $data['config'] = (object)$config;
                    break;
                case 'select':

                    $data = [
                        'type' => $field->field_type_name,
                        'subtype' => $field->field_subtype,
                        'fieldname' => $field->unique_fieldname,
                        'label' => $field->label,
                        'placeholder' => $field->placeholder,
                        'tooltip' => $field->tooltip,
                        'alias' => $field->alias,

                        'classname' => $field->class_name,
                        'gridcolumn' => $field->grid_column,

                        'required' => $field->required ? true : false,

                        'optionstype' => $field->options_type,
                    ];

                    if($field->options_type == 'custom') {
                        if ($field->field_subtype == 'select') {
                            $selecteds = []; //..[]
                            $opts = json_decode($field->options);
                            if(is_array($opts)) {
                                foreach ($opts as $index => $option) {
                                    if($option->selected == true) {
                                        $selecteds[] = (object)array( //..[]
                                            'text' => $option->text,
                                            'value' => $option->value,
                                        );
                                        break;
                                    }
                                }
                            }
                            $data['defaultvalue'] = $selecteds;
                        }

                        if ($field->field_subtype == 'multiselect') {
                            $selecteds = [];
                            $opts = json_decode($field->options);
                            if(is_array($opts)) {
                                foreach ($opts as $index => $option) {
                                    if ($option->selected == true) {
                                        $selecteds[] = (object)array(
                                            'text' => $option->text,
                                            'value' => $option->value,
                                        );
                                    }
                                }
                            }
                            $data['defaultvalue'] = $selecteds;
                        }

                        //if ($field->options) {
                        $data['options'] = $field->options;
                        //}
                    } elseif ($field->options_type == 'catalog') {
                        $data['options'] = $field->options;
                    }

                    if ($field->required) {
                        $data['validations'][] = (object)array('name' => 'required', 'value' => true, 'message' => 'Este campo es obligatorio.');
                    }

                    if ($field->field_subtype == 'multiselect' && $field->minselect != null) {
                        $data['validations'][] = (object)array('name' => 'minselect', 'value' => $field->minselect, 'message' => 'Por favor, seleccione mínimo '.$field->minselect.' elemento(s).');
                    }

                    if ($field->field_subtype == 'multiselect' && $field->maxselect != null) {
                        $data['validations'][] = (object)array('name' => 'maxselect', 'value' => $field->maxselect, 'message' => 'Por favor, seleccione máximo '.$field->maxselect.' elementos.');
                    }

                    if ($field->readonly != null && $field->readonly == true) {
                        $data['readonly'] = true;
                    }

                    if ($field->input_group_prepend) {
                        $data['prepend'] = json_decode($field->input_group_prepend);
                    }

                    if ($field->input_group_append) {
                        $data['append'] = json_decode($field->input_group_append);
                    }

                    if ($field->logic_condition) {
                        $data['conditionlogic'] = json_decode($field->logic_condition);
                    }

                    if($field->select_search != null && $field->select_search == true) {
                        $data['search'] = true;
                    }

                    $config = array();
                    $data['config'] = (object)$config;
                    break;
                case 'checkbox':

                    $data = [
                        'type' => $field->field_type_name,
                        'subtype' => $field->field_subtype,
                        'fieldname' => $field->unique_fieldname,
                        'label' => $field->label,
                        'tooltip' => $field->tooltip,
                        'alias' => $field->alias,

                        'classname' => $field->class_name,
                        'gridcolumn' => $field->grid_column,

                        'required' => $field->required ? true : false,
                    ];

                    $data['options'] = $field->options;

                    $selecteds = [];
                    $opts = json_decode($field->options);
                    if(is_array($opts)) {
                        foreach ($opts as $index => $option) {
                            if($option->selected == true) {
                                $selecteds[] = (object)array(
                                    'text' => $option->text,
                                    'value' => $option->value,
                                );
                            }
                        }
                    }
                    $data['defaultvalue'] = $selecteds;

                    if ($field->required) {
                        $data['validations'][] = (object)array('name' => 'required', 'value' => true, 'message' => 'Este campo es obligatorio.');
                    }

                    if ($field->minselect != null) {
                        $data['validations'][] = (object)array('name' => 'minselect', 'value' => $field->minselect, 'message' => 'Por favor, seleccione mínimo '.$field->minselect.' elemento(s).');
                    }

                    if ($field->maxselect != null) {
                        $data['validations'][] = (object)array('name' => 'maxselect', 'value' => $field->maxselect, 'message' => 'Por favor, seleccione máximo '.$field->maxselect.' elementos.');
                    }

                    if ($field->readonly != null && $field->readonly == true) {
                        $data['readonly'] = true;
                    }

                    if ($field->logic_condition) {
                        $data['conditionlogic'] = json_decode($field->logic_condition);
                    }

                    $config = array();
                    $data['config'] = (object)$config;

                    break;
                case 'datepicker':

                    $data = [
                        'type' => $field->field_type_name,
                        'subtype' => $field->field_subtype,
                        'fieldname' => $field->unique_fieldname,
                        'label' => $field->label,
                        'placeholder' => $field->placeholder,
                        'tooltip' => $field->tooltip,
                        'alias' => $field->alias,

                        'defaultvalue' => $field->default_value,

                        'classname' => $field->class_name,
                        'gridcolumn' => $field->grid_column,

                        'required' => $field->required ? true : false,
                    ];

                    if ($field->required) {
                        $data['validations'][] = (object)array('name' => 'required', 'value' => true, 'message' => 'Este campo es obligatorio.');
                    }

                    //if ($field->field_subtype == 'rangedate' && $field->date_range != null) {
                    //    $data['validations'][] = (object)array('name' => 'rangedate', 'value' => json_decode($field->date_range), 'message' => 'Introduzca una fecha válida.');
                    //}

                    if ($field->readonly != null && $field->readonly == true) {
                        $data['readonly'] = true;
                    }

                    if ($field->logic_condition) {
                        $data['conditionlogic'] = json_decode($field->logic_condition);
                    }

                    $config = array();
                    if ($field->date_start != null) { //$field->field_subtype == 'date'
                        $data['startdate'] = $field->date_start;
                    }

                    if ($field->date_end != null) {
                        $data['enddate'] = $field->date_end;
                    }

                    if ($field->date_format != null) {
                        $data['format'] = $field->date_format;
                    }

                    if ($field->field_subtype == 'rangedate' && $field->date_range != null) {
                        $data['rangedate'] = json_decode($field->date_range);
                    }

                    $data['preview'] = $field->date_preview;

                    $data['config'] = (object)$config;

                    break;
                case 'fileupload':

                    $data = [
                        'type' => $field->field_type_name,
                        'subtype' => $field->field_subtype,
                        'fieldname' => $field->unique_fieldname,
                        'label' => $field->label,
                        'tooltip' => $field->tooltip,
                        'alias' => $field->alias,

                        'defaultvalue' => $field->default_value, //

                        'classname' => $field->class_name,
                        'gridcolumn' => $field->grid_column,

                        'required' => $field->required ? true : false,
                    ];

                    if ($field->required) {
                        $data['validations'][] = (object)array('name' => 'required', 'value' => true, 'message' => 'Este campo es obligatorio.');
                    }

                    if ($field->logic_condition) {
                        $data['conditionlogic'] = json_decode($field->logic_condition);
                    }

                    $config = array();
                    if ($field->file_maxsize != null) {
                        $config['maxFilesize'] = (int)$field->file_maxsize;
                    }

                    if ($field->file_mimetypes != null) {
                        //$config['mimetypes'] = json_decode($field->file_mimetypes);
                        $config['acceptedFiles'] = implode(",",json_decode($field->file_mimetypes));
                    }

                    if ($field->maxfiles != null) {
                        //$config['maxFiles'] = $field->maxfiles;
                        $config['maxFiles'] = 1;
                    }
                    $data['config'] = (object)$config;

                    break;

                case 'hidden':

                    $data = [
                        'type' => $field->field_type_name,
                        'subtype' => $field->field_subtype,
                        'fieldname' => $field->unique_fieldname,

                        'defaultvalue' => $field->default_value,

                        'required' => $field->required ? true : false,
                    ];

                    if ($field->required) {
                        $data['validations'][] = (object)array('name' => 'required', 'value' => true, 'message' => 'Este campo es obligatorio.');
                    }

                    if ($field->automatic_calculation) {
                        //$data['autocalculate'] = json_decode($field->automatic_calculation);
                    }

                    $config = array();
                    $data['config'] = (object)$config;

                    break;
                case 'button':

                    $data = [
                        'type' => $field->field_type_name,
                        'subtype' => $field->field_subtype,
                        'fieldname' => $field->unique_fieldname,
                        'tooltip' => $field->tooltip,

                        'classname' => $field->class_name,
                        'gridcolumn' => $field->grid_column,
                    ];

                    $config = array();
                    $config['text'] = $field->text_html;
                    $data['config'] = (object)$config;

                    break;
                case 'html':

                    $data = [
                        'type' => $field->field_type_name,
                        'subtype' => $field->field_subtype,
                        'fieldname' => $field->unique_fieldname,

                        'defaultvalue' => $field->default_value,

                        'classname' => $field->class_name,
                        'gridcolumn' => $field->grid_column,
                    ];

                    if ($field->field_subtype == 'title') {
                        $data['tooltip'] = $field->tooltip;
                        $data['heading'] = $field->title_heading;
                    }

                    if ($field->field_subtype == 'title' || $field->field_subtype == 'paragraph') {
                        $data['text'] = $field->text_html;
                    }

                    if ($field->field_subtype == 'image') {
                        $data['sourceimage'] = $field->source_image;
                    }

                    if ($field->field_subtype == 'title' && $field->color != null) {
                        $data['color'] = $field->color;
                    }

                    $config = array();
                    $data['config'] = (object)$config;

                    break;
            }

            $data['show'] = true;

            $schema[] = (object)$data;

        }

        return $schema;
    }
}
