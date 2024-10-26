<?php

namespace App\Containers\CoreMonitoring\Analysis\Models;

use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Containers\CoreMonitoring\Monitoring\Models\MonitoringReport;
use App\Ship\Parents\Models\Model as ParentModel;

class AnalysisReportStatusActivity extends ParentModel
{
    protected $table = 'analysis_report_status_activity';

    protected $fillable = [
        'fid_analysis_report',
        'current_status',
        'new_status',
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
        'created_at',
        'updated_at',
    ];

    protected string $resourceKey = 'analysis_report_status_activity';

}
