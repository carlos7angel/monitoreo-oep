<?php

namespace App\Containers\CoreMonitoring\Analysis\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Analysis\Data\Repositories\AnalysisReportRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class CountAnalysesByElectionTask extends ParentTask
{
    public function __construct(
        protected AnalysisReportRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($election_id): mixed
    {
        return $this->repository->findWhere(['fid_election' => $election_id])->count();
    }
}
