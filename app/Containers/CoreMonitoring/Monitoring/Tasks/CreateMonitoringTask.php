<?php

namespace App\Containers\CoreMonitoring\Monitoring\Tasks;

use App\Containers\CoreMonitoring\Monitoring\Data\Repositories\MonitoringRepository;
use App\Containers\CoreMonitoring\Monitoring\Models\Monitoring;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateMonitoringTask extends ParentTask
{
    public function __construct(
        protected MonitoringRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Monitoring
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
