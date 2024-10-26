<?php

namespace App\Containers\CoreMonitoring\Analysis\Models;

use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Containers\CoreMonitoring\Monitoring\Models\MonitoringReport;
use App\Ship\Parents\Models\Model as ParentModel;

class AnalysisReport extends ParentModel
{
    protected $table = 'analysis_reports';

    protected $fillable = [
        'code',
        'fid_monitoring_report',
        'fid_election',
        'status',
        'created_by',
        'scope_type',
        'scope_department',

        'file_resolution_first',
        'file_resolution_final',
        'observations',
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

    protected string $resourceKey = 'analysis_report';

    public function election()
    {
        return $this->belongsTo(Election::class, 'fid_election');
    }

    public function monitoringReport()
    {
        return $this->belongsTo(MonitoringReport::class, 'fid_monitoring_report');
    }

    public function statusActivity()
    {
        return $this->hasMany(AnalysisReportStatusActivity::class, 'fid_analysis_report');
    }

}
