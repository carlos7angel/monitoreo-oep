<?php

namespace App\Containers\CoreMonitoring\Monitoring\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Monitoring\Models\MonitoringReport;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringByIdTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringReportByIdTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\DB;

class RemoveItemFromMonitoringReportAction extends ParentAction
{
    public function __construct() {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request): MonitoringReport
    {
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');
//        if(! $user->hasRole(['monitor'])) {
//            throw new AuthorizationException('No tiene los permisos para realizar esta acción');
//        }
        $monitoring_report = app(FindMonitoringReportByIdTask::class)->run($request->id);
        $monitoring_item = app(FindMonitoringByIdTask::class)->run($request->monitoring_item_id);

        return DB::transaction(function () use ($monitoring_report, $monitoring_item) {

            $monitoring_report->monitoringItems()->detach($monitoring_item->id);
            $monitoring_report->save();

            $monitoring_item->status = 'CREATED';
            $monitoring_item->save();

            return $monitoring_report;
        });

    }
}
