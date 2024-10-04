<?php

namespace App\Containers\CoreMonitoring\UserProfile\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaType extends ParentModel
{
    protected $table = 'media_types';

    protected $fillable = [
        'fid_media_profile',
        'type',

        'coverage',
        'scope',
        'scope_department',
        'scope_area',

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
    protected string $resourceKey = 'mediaTypes';

    /**
     * Eloquent Relationships
     */

//    public function mediaProfile()
//    {
//        return $this->hasOne(MediaProfile::class, 'unique_code', 'file_rep_document');
//    }

}
