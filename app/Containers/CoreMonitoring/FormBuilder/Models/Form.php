<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Models;

use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends ParentModel
{
    use SoftDeletes;

    protected $table = 'forms';

    protected $fillable = [
        "unique_code",
        "name",
        "description",
        "created_by",
        "form_type",
        "form_parent_id",
        "form_class",
        "active",
        "form_schema_config",
        "form_schema_web",
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
    protected string $resourceKey = 'forms';

    /**
     * Eloquent Relationships
     */
    public function election()
    {
        return $this->hasOne(Election::class, 'fid_form_media_registration');
    }
}
