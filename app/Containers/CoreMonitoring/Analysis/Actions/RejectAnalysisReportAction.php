<?php

namespace App\Containers\CoreMonitoring\Analysis\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Analysis\Models\AnalysisReport;
use App\Containers\CoreMonitoring\Analysis\Tasks\CreateStatusActivityAnalysisReportTask;
use App\Containers\CoreMonitoring\Analysis\Tasks\FindAnalysisReportByIdTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringByIdTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringReportByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\ValidationFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RejectAnalysisReportAction extends ParentAction
{
    public function __construct(
        private FindAnalysisReportByIdTask $findAnalysisReportByIdTask,
        private CreateStatusActivityAnalysisReportTask $createStatusActivityAnalysisReportTask,
        private GetAuthenticatedUserByGuardTask $getAuthenticatedUserByGuardTask,
    ) {
    }

    /**
     * @throws ValidationFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): AnalysisReport
    {
        $data = $request->sanitizeInput($request->all());
        $user = $this->getAuthenticatedUserByGuardTask->run('web');
        $analysis_report = $this->findAnalysisReportByIdTask->run($request->id);
        if ($analysis_report->status !== 'NEW') {
            throw new ValidationFailedException(
                'Operación no permitida, el estado no esta autorizado para realizar esta acción.'
            );
        }

        $monitoring_report = app(FindMonitoringReportByIdTask::class)
                                ->run($analysis_report->fid_monitoring_report);
        $monitoring_item = app(FindMonitoringByIdTask::class)->run($monitoring_report->fid_monitoring_item);

        return DB::transaction(function () use ($data, $analysis_report, $user, $monitoring_report, $monitoring_item) {
            $new_status = 'REJECTED';
            $analysis_status_data = [
                'fid_analysis_report' => $analysis_report->id,
                'status' => $new_status,
                'previous_status' => $analysis_report->status,
                'observations' => $data['analysis_rejected_observations'],
                'registered_by' => $user->id,
                'registered_at' => Carbon::now()
            ];
            $activity = $this->createStatusActivityAnalysisReportTask->run($analysis_status_data);

            $analysis_report->status = $new_status;
            $analysis_report->fid_last_analysis_report_activity = $activity->id;
            $analysis_report->save();

            $monitoring_report->status = 'REJECTED';
            $monitoring_report->save();

            $monitoring_item->status = 'REJECTED';
            $monitoring_item->save();

            return $analysis_report;
        });

    }
}
