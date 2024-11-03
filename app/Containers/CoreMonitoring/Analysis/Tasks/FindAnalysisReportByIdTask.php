<?php

namespace App\Containers\CoreMonitoring\Analysis\Tasks;

use App\Containers\CoreMonitoring\Analysis\Data\Repositories\AnalysisReportRepository;
use App\Containers\CoreMonitoring\Analysis\Models\AnalysisReport;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindAnalysisReportByIdTask extends ParentTask
{
    public function __construct(
        protected AnalysisReportRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): AnalysisReport
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
