<?php

namespace App\Containers\CoreMonitoring\Analysis\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Analysis\Models\AnalysisReport;
use App\Containers\CoreMonitoring\Analysis\Tasks\CreateAnalysisReportTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringReportByIdTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateAnalysisReportAction extends ParentAction
{
    public function __construct(
        private CreateAnalysisReportTask $createAnalysisReportTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request): AnalysisReport
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $monitoring_report = app(FindMonitoringReportByIdTask::class)->run($request->id);

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');
        if(! $user->hasRole(['analyst', 'admin'])) { // TODO: Remove admin and only let to monitor role && add other kind of actions like just let role with TSE or TED
            throw new AuthorizationException('No tiene los permisos para realizar esta acción');
        }

        $data = [
            'code' => md5(Carbon::now()->timestamp . $user->id .  $monitoring_report->id . Str::random(24)),
            'fid_monitoring_report' => $monitoring_report->id,
            'fid_election' => $monitoring_report->fid_election,
            'status' => 'NEW',
            'created_by' => $user->id,
            'scope_type' => $monitoring_report->scope_type,
            'scope_department' => $monitoring_report->scope_department,
        ];

        return DB::transaction(function () use ($data, $monitoring_report) {

            $analysis_report = $this->createAnalysisReportTask->run($data);
            $analysis_report->code = 'A-' . strtoupper(substr(md5($analysis_report->id . $analysis_report->code),0,6)) . '/' . Carbon::now()->format('y');
            $analysis_report->save();

            $monitoring_report->status = 'IN_PROGRESS';
            $monitoring_report->save();

            return $analysis_report;
        });

    }
}
