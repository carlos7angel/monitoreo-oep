<?php

namespace App\Containers\CoreMonitoring\Analysis\Events;

use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\GetUsersByRolesScopeTask;
use App\Containers\CoreMonitoring\Analysis\Mails\SendSubmitAnalysis;
use App\Containers\CoreMonitoring\Analysis\Models\AnalysisReport;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class CreateSubmitAnalysisReportToPlenaryNotificationEvent extends ParentEvent implements ShouldQueue
{
    protected $analysis_report;
    protected $user;

    public function __construct(AnalysisReport $_analysis_report, User $_user)
    {
        $this->analysis_report = $_analysis_report;
        $this->user = $_user;
    }

    public function handle()
    {
        $scope_type = $this->analysis_report->scope_type_plenary;
        $scope_department = $this->analysis_report->scope_department_plenary;

        $users = app(GetUsersByRolesScopeTask::class)->run(['plenary'], $scope_type, $scope_department);
        foreach ($users as $user) {
            Mail::send(new SendSubmitAnalysis($user, $this->analysis_report));
        }
    }

}
