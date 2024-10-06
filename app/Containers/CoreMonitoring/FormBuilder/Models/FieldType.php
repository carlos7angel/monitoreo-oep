<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class FieldType extends ParentModel
{
    protected $table = 'field_types';

    protected $fillable = [
        "name",
        "type",
        "description",
        "category",
        "options",
        "icon",
        "active",
        "created_at",
        "updated_at",
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
    protected string $resourceKey = 'field_types';

    /**
     * Eloquent Relationships
     */

}
