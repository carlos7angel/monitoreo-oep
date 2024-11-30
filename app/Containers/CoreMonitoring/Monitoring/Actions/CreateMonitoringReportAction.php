<?php

namespace App\Containers\CoreMonitoring\Monitoring\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Containers\CoreMonitoring\Monitoring\Models\MonitoringReport;
use App\Containers\CoreMonitoring\Monitoring\Tasks\CreateMonitoringReportTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\GetOpenMonitoringItemsByElectionScopeTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateMonitoringReportAction extends ParentAction
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
        $election = app(FindElectionByIdTask::class)->run($request->election_id);

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');
        if (! $user->hasRole(['monitor'])) {
            throw new AuthorizationException('No tiene los permisos para realizar esta acción');
        }
        $scope_type = $scope_department = null;
        if ($user->type === 'TSE' || empty($user->type)) {
            $scope_type = 'TSE';
            $scope_department = 'Nacional';
        }
        if ($user->type === 'TED') {
            $scope_type = $user->type ;
            $scope_department = $user->department;
        }

        $monitoring_items = app(GetOpenMonitoringItemsByElectionScopeTask::class)->run($election->id, $scope_type, $scope_department, $user);

        if ($monitoring_items->count() <= 0) {
            throw new CreateResourceFailedException('No existen registros de monitoreo para reportar');
        }

        $data = [
            'code' => substr(hash("sha512", Carbon::now()->timestamp . $user->id .  $election->id . Str::random(24)),0,30),
            'fid_election' => $election->id,
            'status' => 'NEW',
            'created_by' => $user->id,
            'scope_type' => $scope_type,
            'scope_department' => $scope_department,
        ];

        return DB::transaction(function () use ($data, $monitoring_items, $request) {

            $monitoring_report = $this->createMonitoringReportTask->run($data);
            $monitoring_report->monitoringItems()->sync($monitoring_items->pluck('id')->toArray());
            $monitoring_report->code = 'R-' . strtoupper(substr(hash("sha512", $monitoring_report->id . $monitoring_report->code), 0, 6)) . '/' . Carbon::now()->format('y');
            $monitoring_report->save();

            foreach ($monitoring_items->all() as $monitoring_item) {
                $monitoring_item->status = 'SELECTED';
                $monitoring_item->save();
            }

            return $monitoring_report;
        });

    }
}
