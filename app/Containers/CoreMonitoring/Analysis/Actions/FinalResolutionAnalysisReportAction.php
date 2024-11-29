<?php

namespace App\Containers\CoreMonitoring\Analysis\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Analysis\Models\AnalysisReport;
use App\Containers\CoreMonitoring\Analysis\Tasks\CreateStatusActivityAnalysisReportTask;
use App\Containers\CoreMonitoring\Analysis\Tasks\FindAnalysisReportByIdTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateFileTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringByIdTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringReportByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\ValidationFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FinalResolutionAnalysisReportAction extends ParentAction
{
    public function __construct(
        private FindAnalysisReportByIdTask $findAnalysisReportByIdTask,
        private CreateStatusActivityAnalysisReportTask $createStatusActivityAnalysisReportTask,
        private GetAuthenticatedUserByGuardTask $getAuthenticatedUserByGuardTask,

        private CreateFileTask $createFileTask,
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
        if($analysis_report->status !== 'IN_TREATMENT' && $analysis_report->status !== 'COMPLEMENTARY_REPORT'
        && $analysis_report->status !== 'IN_TREATMENT_PLENARY' && $analysis_report->status !== 'COMPLEMENTARY_REPORT_PLENARY'
        && $analysis_report->status !== 'SECOND_INSTANCE_RESOLUTION') {
            throw new ValidationFailedException('Operación no permitida, el estado no esta autorizado para realizar esta acción.');
        }
        if(! $request->file('analysis_file_final_resolution')) {
            throw new ValidationFailedException('El archivo es un campo obligatorio');
        }

        return DB::transaction(function () use ($data, $analysis_report, $user, $request) {

            if($request->file('analysis_file_final_resolution')) {
                $file_report = $this->createFileTask->run($request->file('analysis_file_final_resolution'), 'analysis-report', $analysis_report->id, $user);
                $analysis_report->file_resolution_final_instance = $file_report->unique_code;
            }

            $new_status = 'FINALIZED';
            $analysis_status_data = [
                'fid_analysis_report' => $analysis_report->id,
                'status' => $new_status,
                'previous_status' => $analysis_report->status,
                'observations' => $data['analysis_observations'],
                'final_status' => $data['analysis_final_status'],
                'registered_by' => $user->id,
                'registered_at' => Carbon::now()
            ];
            $activity = $this->createStatusActivityAnalysisReportTask->run($analysis_status_data);

            $monitoring_report = app(FindMonitoringReportByIdTask::class)->run($analysis_report->fid_monitoring_report);
            $monitoring_report->status = 'FINISHED';
            $monitoring_report->save();
            $monitoring_item = app(FindMonitoringByIdTask::class)->run($monitoring_report->fid_monitoring_item);
            $monitoring_item->status = 'FINISHED';
            $monitoring_item->save();

            $analysis_report->status = $new_status;
            $analysis_report->fid_last_analysis_report_activity = $activity->id;
            $analysis_report->save();

            return $analysis_report;
        });

    }
}
