<?php

namespace App\Containers\CoreMonitoring\Analysis\Tasks;

use App\Containers\CoreMonitoring\Analysis\Data\Repositories\ActivityAnalysisReportRepository;
use App\Containers\CoreMonitoring\Analysis\Models\ActivityAnalysisReport;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateStatusActivityAnalysisReportTask extends ParentTask
{
    public function __construct(
        protected ActivityAnalysisReportRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): ActivityAnalysisReport
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
