<?php

namespace App\Containers\CoreMonitoring\Monitoring\Models;

use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonitoringItem extends ParentModel
{
    use SoftDeletes;

    protected $table = 'monitoring_items';

    protected $fillable = [

        'code',
        'media_type',
        'fid_election',
        'fid_media_profile',
        'fid_form',
        'data',
        'render',
        'status',
        'scope_type',
        'scope_department',
        'registered_by',
        'registered_at',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'registered_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected string $resourceKey = 'Monitoring';

    public function election()
    {
        return $this->belongsTo(Election::class, 'fid_election');
    }

    public function mediaProfile()
    {
        return $this->belongsTo(MediaProfile::class, 'fid_media_profile');
    }
}
