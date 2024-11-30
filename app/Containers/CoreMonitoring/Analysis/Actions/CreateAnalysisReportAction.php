<?php

namespace App\Containers\CoreMonitoring\Analysis\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Analysis\Models\AnalysisReport;
use App\Containers\CoreMonitoring\Analysis\Tasks\CreateAnalysisReportTask;
use App\Containers\CoreMonitoring\Analysis\Tasks\CreateStatusActivityAnalysisReportTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringReportByIdTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\ValidationFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateAnalysisReportAction extends ParentAction
{
    public function __construct(
        private CreateAnalysisReportTask $createAnalysisReportTask,
        private CreateStatusActivityAnalysisReportTask $createStatusActivityAnalysisReportTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request): AnalysisReport
    {
        $sanitizedData = $request->sanitizeInput([

        ]);

        $monitoring_report = app(FindMonitoringReportByIdTask::class)->run($request->id);
        if ($monitoring_report->status !== 'SUBMITTED') {
            throw new ValidationFailedException('Operación no permitida. El registro no puede cambiar de estado.');
        }

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');
        if (! $user->hasRole(['analyst'])) {
            throw new AuthorizationException('No tiene los permisos para realizar esta acción');
        }

        $data = [
            'code' => substr(hash("sha512", Carbon::now()->timestamp . $user->id .  $monitoring_report->id . Str::random(24)), 0, 30),
            'fid_monitoring_report' => $monitoring_report->id,
            'fid_election' => $monitoring_report->fid_election,
            'status' => 'NEW',
            'place' => 'IN_ANALYST',
            'created_by' => $user->id,
            'scope_type' => $monitoring_report->scope_type,
            'scope_department' => $monitoring_report->scope_department,
        ];

        return DB::transaction(function () use ($data, $monitoring_report, $request, $user) {

            $analysis_report = $this->createAnalysisReportTask->run($data);
            $analysis_report->code = 'A-' . strtoupper(substr(hash("sha512", $analysis_report->id . $analysis_report->code), 0, 6)) . '/' . Carbon::now()->format('y');

            $analysis_status = [
                'fid_analysis_report' => $analysis_report->id,
                'status' => $analysis_report->status,
                'registered_by' => $user->id,
                'registered_at' => Carbon::now()
            ];
            $activity = $this->createStatusActivityAnalysisReportTask->run($analysis_status);
            $analysis_report->fid_last_analysis_report_activity = $activity->id;
            $analysis_report->save();

            $monitoring_report->status = 'IN_PROGRESS';
            $monitoring_report->save();

            // Add Log
            App::make(Dispatcher::class)->dispatch(
                new AddActivityLogEvent(LogConstants::CREATE_ANALYSIS_REPORT, $request->server(), $analysis_report)
            );

            return $analysis_report;
        });

    }
}
