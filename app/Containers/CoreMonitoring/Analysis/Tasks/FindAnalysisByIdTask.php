<?php

namespace App\Containers\CoreMonitoring\Analysis\Tasks;

use App\Containers\CoreMonitoring\Analysis\Data\Repositories\AnalysisRepository;
use App\Containers\CoreMonitoring\Analysis\Models\Analysis;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindAnalysisByIdTask extends ParentTask
{
    public function __construct(
        protected readonly AnalysisRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Analysis
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
