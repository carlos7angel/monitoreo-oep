<?php

namespace App\Containers\CoreMonitoring\Analysis\Models;

use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Containers\CoreMonitoring\FileManager\Models\File;
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
        'scope_type_secretariat',
        'scope_type_plenary',
        'scope_department',
        'scope_department_secretariat',
        'scope_department_plenary',
        'fid_last_analysis_report_activity',

        'file_analysis_report',
        'file_analysis_report_complementary',
        'file_resolution_first_instance',
        'file_resolution_final_instance',
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

    public function statusActivities()
    {
        return $this->hasMany(ActivityAnalysisReport::class, 'fid_analysis_report');
    }

    public function lastStatusActivity()
    {
        return $this->belongsTo(ActivityAnalysisReport::class, 'fid_last_analysis_report_activity');
    }

    /**
     * Files
     */

    public function fileAnalysisReport()
    {
        return $this->hasOne(File::class, 'unique_code', 'file_analysis_report');
    }

    public function fileAnalysisComplementaryReport()
    {
        return $this->hasOne(File::class, 'unique_code', 'file_analysis_report_complementary');
    }

    public function fileAnalysisComplementaryReportPlenary()
    {
        return $this->hasOne(File::class, 'unique_code', 'file_analysis_report_complementary_plenary');
    }

    public function fileAnalysisResolutionFirstInstance()
    {
        return $this->hasOne(File::class, 'unique_code', 'file_resolution_first_instance');
    }

    public function fileAnalysisResolutionFinalInstance()
    {
        return $this->hasOne(File::class, 'unique_code', 'file_resolution_final_instance');
    }

}
