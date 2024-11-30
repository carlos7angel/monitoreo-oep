<?php

namespace App\Containers\CoreMonitoring\Analysis\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Analysis\Events\CreateSubmitAnalysisReportToPlenaryNotificationEvent;
use App\Containers\CoreMonitoring\Analysis\Models\AnalysisReport;
use App\Containers\CoreMonitoring\Analysis\Tasks\CreateStatusActivityAnalysisReportTask;
use App\Containers\CoreMonitoring\Analysis\Tasks\FindAnalysisReportByIdTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateFileTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\ValidationFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class FirstResolutionAnalysisReportAction extends ParentAction
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
        if ($analysis_report->status !== 'IN_TREATMENT' && $analysis_report->status !== 'COMPLEMENTARY_REPORT') {
            throw new ValidationFailedException('Operación no permitida, el estado no esta autorizado para realizar esta acción.');
        }
        if (! $request->file('analysis_file_first_resolution')) {
            throw new ValidationFailedException('El archivo es un campo obligatorio');
        }

        return DB::transaction(function () use ($data, $analysis_report, $user, $request) {

            if ($request->file('analysis_file_first_resolution')) {
                $file_report = $this->createFileTask->run($request->file('analysis_file_first_resolution'), 'analysis-report', $analysis_report->id, $user);
                $analysis_report->file_resolution_first_instance = $file_report->unique_code;
            }

            $new_status = 'UNTREATED_PLENARY';
            $analysis_status_data = [
                'fid_analysis_report' => $analysis_report->id,
                'status' => $new_status,
                'previous_status' => $analysis_report->status,
                'observations' => $data['analysis_observations'],
                'registered_by' => $user->id,
                'registered_at' => Carbon::now()
            ];
            $activity = $this->createStatusActivityAnalysisReportTask->run($analysis_status_data);

            $analysis_report->scope_type_plenary = 'TSE';
            $analysis_report->scope_department_plenary = 'Nacional';

            $analysis_report->status = $new_status;
            $analysis_report->place = 'IN_PLENARY';
            $analysis_report->fid_last_analysis_report_activity = $activity->id;
            $analysis_report->save();

            // Add Log
            App::make(Dispatcher::class)->dispatch(new AddActivityLogEvent(LogConstants::SUBMIT_ANALYSIS_TO_PLENARY, $request->server(), $analysis_report));

            // Send Notification
            App::make(Dispatcher::class)->dispatch(new CreateSubmitAnalysisReportToPlenaryNotificationEvent($analysis_report, $user));

            return $analysis_report;
        });

    }
}
