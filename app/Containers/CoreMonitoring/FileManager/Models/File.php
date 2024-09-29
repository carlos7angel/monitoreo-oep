<?php

namespace App\Containers\CoreMonitoring\FileManager\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends ParentModel
{
    use SoftDeletes;

    protected $table = 'files';

    public $timestamps = false;

    protected $fillable = [
        'unique_code',
        'file_hash',
        'name',
        'origin_name',
        'mime_type',
        'size',
        'url_file',
        'path_file',
        'locale_upload',
        'fid_user',
        'status',
        'fileable_id',
        'fileable_type',
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
        'deleted_at',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'files';

    /**
     * Eloquent Relationships
     */
    public function fileable()
    {
        return $this->morphTo();
    }
}
