<?php

namespace App\Containers\CoreMonitoring\Monitoring\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Monitoring\Data\Repositories\MonitoringItemRepository;
use App\Ship\Criterias\SkipTakeCriteria;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListMonitoringsTask extends ParentTask
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
        $this->repository->pushCriteria(new SkipTakeCriteria(0, 10));

        $result = $this->repository->findWhere([
            'fid_election' => $election_id
        ])->all();


        return $result;
    }
}
