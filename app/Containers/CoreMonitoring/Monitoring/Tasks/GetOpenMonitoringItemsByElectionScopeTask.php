<?php

namespace App\Containers\CoreMonitoring\Monitoring\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Monitoring\Data\Repositories\MonitoringItemRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetOpenMonitoringItemsByElectionScopeTask extends ParentTask
{
    public function __construct(
        protected MonitoringItemRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($election_id, $scope_type, $scope_department, $user): mixed
    {
        $conditions = [
            ['fid_election', '=', $election_id],
            ['status', '=', 'CREATED'],
        ];

        if (!(empty($scope_type) || empty($scope_department))) {
            $conditions[] = ['scope_type', '=', $scope_type];
            $conditions[] = ['scope_department', '=', $scope_department];
        }

        return $this->repository->findWhere($conditions);
    }
}
