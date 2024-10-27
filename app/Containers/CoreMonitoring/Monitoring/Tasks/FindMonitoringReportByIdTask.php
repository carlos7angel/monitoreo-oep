<?php

namespace App\Containers\CoreMonitoring\Monitoring\Tasks;

use App\Containers\CoreMonitoring\Monitoring\Data\Repositories\MonitoringReportRepository;
use App\Containers\CoreMonitoring\Monitoring\Models\MonitoringReport;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindMonitoringReportByIdTask extends ParentTask
{
    public function __construct(
        protected MonitoringReportRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): MonitoringReport
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
