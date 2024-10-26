<?php

namespace App\Containers\CoreMonitoring\Monitoring\Models;

use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Ship\Parents\Models\Model as ParentModel;

class MonitoringReport extends ParentModel
{
    protected $table = 'monitoring_reports';

    protected $fillable = [
        'code',
        'fid_election',
        'status',
        'created_by',
        'submitted_at',
        'observations',
        'scope_type',
        'scope_department',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'submitted_at',
        'created_at',
        'updated_at',
    ];

    protected string $resourceKey = 'monitoring_report';

    public function election()
    {
        return $this->belongsTo(Election::class, 'fid_election');
    }

    public function monitoringItems()
    {
        return $this->belongsToMany(MonitoringItem::class, 'monitoring_item_report', 'fid_monitoring_report', 'fid_monitoring_item');
    }
}
