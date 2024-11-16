<?php

namespace App\Containers\CoreMonitoring\Monitoring\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Monitoring\Data\Repositories\MonitoringItemRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class CountMonitoringItemsByElectionTask extends ParentTask
{
    public function __construct(
        protected MonitoringItemRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($election_id = null): mixed
    {
        return $this->repository->findWhere(['fid_election' => $election_id])->count();
    }
}
