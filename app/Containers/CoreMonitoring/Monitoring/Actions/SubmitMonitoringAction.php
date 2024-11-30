<?php

namespace App\Containers\CoreMonitoring\Monitoring\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Containers\CoreMonitoring\Monitoring\Events\CreateSubmitAnalysisReportNotificationEvent;
use App\Containers\CoreMonitoring\Monitoring\Events\SubmitMonitoringNotificationEvent;
use App\Containers\CoreMonitoring\Monitoring\Models\MonitoringReport;
use App\Containers\CoreMonitoring\Monitoring\Tasks\CreateMonitoringReportTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringByIdTask;
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

class SubmitMonitoringAction extends ParentAction
{
    public function __construct(
        private CreateMonitoringReportTask $createMonitoringReportTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request): MonitoringReport
    {
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');
        if (! $user->hasRole(['monitor'])) {
            throw new AuthorizationException('No tiene los permisos para realizar esta acción');
        }

        $election = app(FindElectionByIdTask::class)->run($request->election_id);
        $monitoring_item = app(FindMonitoringByIdTask::class)->run($request->id);
        if ($monitoring_item->status !== 'CREATED') {
            throw new ValidationFailedException('El registro no puede cambiar de estado.');
        }

        $data = [
            'code' => md5(Carbon::now()->timestamp . $user->id .  $election->id . Str::random(24)),
            'fid_election' => $election->id,
            'status' => 'SUBMITTED',
            'submitted_at' => Carbon::now(),
            'created_by' => $user->id,
            'fid_monitoring_item' => $monitoring_item->id,
        ];
        if ($monitoring_item->scope_type === 'TSE') {
            $data['scope_type'] = $request->monitoring_scope === 'Nacional' ? 'TSE' : 'TED';
            $data['scope_department'] = $request->monitoring_scope;
        } elseif ($monitoring_item->scope_type === 'TED') {
            $data['scope_type'] = $monitoring_item->scope_type;
            $data['scope_department'] = $monitoring_item->scope_department;
        }

        return DB::transaction(function () use ($data, $monitoring_item, $request, $user) {

            $monitoring_report = $this->createMonitoringReportTask->run($data);
            $monitoring_report->code = 'R-' . strtoupper(substr(md5($monitoring_report->id . $monitoring_report->code), 0, 6)) . '/' . Carbon::now()->format('y');
            $monitoring_report->save();

            $monitoring_item->status = 'SELECTED';
            $monitoring_item->save();

            // Add Log
            App::make(Dispatcher::class)->dispatch(new AddActivityLogEvent(LogConstants::SUBMIT_MONITORING_TO_REPORT, $request->server(), $monitoring_report));

            // Send Notification
            App::make(Dispatcher::class)->dispatch(new SubmitMonitoringNotificationEvent($monitoring_report, $user));

            return $monitoring_report;
        });

    }
}
