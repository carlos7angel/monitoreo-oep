<?php

namespace App\Containers\CoreMonitoring\Monitoring\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Containers\CoreMonitoring\Monitoring\Models\MonitoringReport;
use App\Containers\CoreMonitoring\Monitoring\Tasks\CreateMonitoringReportTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringReportByIdTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\GetMonitoringItemsByIdsTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\GetOpenMonitoringItemsByElectionScopeTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddItemsForMonitoringReportAction extends ParentAction
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
        $monitoring_report = app(FindMonitoringReportByIdTask::class)->run($request->id);
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $monitoring_item_ids = $request->has('new_monitoring_items') ? $request->get('new_monitoring_items') : [];
        if(count($monitoring_item_ids) <= 0) {
            throw new CreateResourceFailedException('No existen registros para adicionar');
        }

        $monitoring_items = app(GetMonitoringItemsByIdsTask::class)->run($monitoring_item_ids);

        return DB::transaction(function () use ($monitoring_report, $monitoring_items) {
            $monitoring_report->monitoringItems()->syncWithoutDetaching($monitoring_items->pluck('id')->toArray());
            $monitoring_report->save();
            foreach ($monitoring_items->all() as $monitoring_item) {
                $monitoring_item->status = 'SELECTED';
                $monitoring_item->save();
            }
            return $monitoring_report;
        });

    }
}
