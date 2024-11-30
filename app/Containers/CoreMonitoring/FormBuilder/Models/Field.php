<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Field extends ParentModel
{
    protected $table = 'form_fields';

    protected $fillable = [
        'id',
        'fid_form',
        'fid_field_type',
        'field_type_name',
        'unique_fieldname',
        'label',
        'placeholder',
        'tooltip',
        'alias',
        'field_subtype',
        'default_value',
        'textarea_rows',
        'type_url',
        'select_search',
        'options_type',
        'options',
        'file_maxsize',
        'file_mimetypes',
        'date_start',
        'date_end',
        'date_format',
        'date_range',
        'date_preview',
        'table_form_id',
        'table_edit_option',
        'table_delete_option',
        'text_html',
        'source_image',
        'required',
        'minlength',
        'maxlength',
        'regex',
        'readonly',
        'min',
        'max',
        'minselect',
        'maxselect',
        'maxfiles',
        'minrows',
        'maxrows',
        'grid_column',
        'input_group_prepend',
        'input_group_append',
        'class_name',
        'title_heading',
        'color',
        'logic_condition',
        'automatic_calculation',
        'active',
        'order',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'fields';

    /**
     * Eloquent Relationships
     */

    public function fieldType()
    {
        return $this->belongsTo(FieldType::class, 'fid_field_type');
    }

    public function form()
    {
        return $this->belongsTo(Form::class, 'fid_form', );
    }
}
