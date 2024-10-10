<?php

namespace App\Containers\CoreMonitoring\Monitoring\Tasks;

use App\Containers\CoreMonitoring\Monitoring\Data\Repositories\MonitoringRepository;
use App\Containers\CoreMonitoring\Monitoring\Models\Monitoring;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindMonitoringByIdTask extends ParentTask
{
    public function __construct(
        protected readonly MonitoringRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Monitoring
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
