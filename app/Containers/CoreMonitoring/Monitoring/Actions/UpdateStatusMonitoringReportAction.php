<?php

namespace App\Containers\CoreMonitoring\Monitoring\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Monitoring\Models\MonitoringReport;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringByIdTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringReportByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UpdateStatusMonitoringReportAction extends ParentAction
{
    public function __construct(
        private FindMonitoringReportByIdTask $findMonitoringReportByIdTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): MonitoringReport
    {
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');
        $monitoring_report = $this->findMonitoringReportByIdTask->run($request->id);

        return DB::transaction(function () use ($monitoring_report, $user) {

            $monitoring_report->status = $request->monitoring_report_status;

            if ($request->monitoring_report_status === 'SUBMITTED' ||
                $request->monitoring_report_status === 'ARCHIVED' ||
                $request->monitoring_report_status === 'REJECTED') {
                $monitoring_report->submitted_at = Carbon::now()->toDateTimeString();
                $monitoring_report->observations = $request->monitoring_report_observations;
                $monitoring_item = app(FindMonitoringByIdTask::class)->run($monitoring_report->fid_monitoring_item);
                if ($request->monitoring_report_status === 'REJECTED') {
                    $monitoring_item->status = 'REJECTED';
                }
                if ($request->monitoring_report_status === 'ARCHIVED') {
                    $monitoring_item->status = 'ARCHIVED';
                }
                $monitoring_item->save();
            }

            $monitoring_report->save();

            return $monitoring_report;

        });
    }
}
