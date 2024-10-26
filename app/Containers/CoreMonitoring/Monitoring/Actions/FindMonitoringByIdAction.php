<?php

namespace App\Containers\CoreMonitoring\Monitoring\Actions;

use App\Containers\CoreMonitoring\Monitoring\Models\MonitoringItem;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringByIdTask;
use App\Containers\CoreMonitoring\Monitoring\UI\WEB\Requests\FindMonitoringByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindMonitoringByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindMonitoringByIdTask $findMonitoringByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindMonitoringByIdRequest $request): MonitoringItem
    {
        return $this->findMonitoringByIdTask->run($request->id);
    }
}
