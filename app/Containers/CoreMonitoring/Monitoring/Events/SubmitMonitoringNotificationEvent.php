<?php

namespace App\Containers\CoreMonitoring\Monitoring\Events;

use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\GetUsersByRolesScopeTask;
use App\Containers\CoreMonitoring\Monitoring\Mails\SendSubmitMonitoring;
use App\Containers\CoreMonitoring\Monitoring\Models\MonitoringReport;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SubmitMonitoringNotificationEvent extends ParentEvent implements ShouldQueue
{
    protected $monitoring_report;
    protected $user;

    public function __construct(MonitoringReport $_monitoring_report, User $_user)
    {
        $this->monitoring_report = $_monitoring_report;
        $this->user = $_user;
    }

    public function handle()
    {
        $scope_type = $scope_department = null;
        if ($this->user->type === 'TSE' || empty($this->user->type)) {
            $scope_type = 'TSE';
            $scope_department = 'Nacional';
        }
        if ($this->user->type === 'TED') {
            $scope_type = $this->user->type ;
            $scope_department = $this->user->department;
        }

        $users = app(GetUsersByRolesScopeTask::class)->run(['analyst'], $scope_type, $scope_department);
        foreach ($users as $user) {
            Mail::send(new SendSubmitMonitoring($user, $this->monitoring_report));
        }
    }

}
