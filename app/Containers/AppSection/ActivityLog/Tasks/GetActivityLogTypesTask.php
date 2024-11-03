<?php

namespace App\Containers\AppSection\ActivityLog\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ActivityLog\Data\Repositories\ActivityLogRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetActivityLogTypesTask extends ParentTask
{
    public function __construct(
        protected ActivityLogRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->repository->scopeQuery(function ($query) {
            return  $query->select(['log_name'])->groupBy('log_name');
        })->all();
    }
}
