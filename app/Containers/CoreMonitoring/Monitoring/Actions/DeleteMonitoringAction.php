<?php

namespace App\Containers\CoreMonitoring\Monitoring\Actions;

use App\Containers\CoreMonitoring\Monitoring\Tasks\DeleteMonitoringTask;
use App\Containers\CoreMonitoring\Monitoring\UI\WEB\Requests\DeleteMonitoringRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteMonitoringAction extends ParentAction
{
    public function __construct(
        private readonly DeleteMonitoringTask $deleteMonitoringTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteMonitoringRequest $request): int
    {
        return $this->deleteMonitoringTask->run($request->id);
    }
}
