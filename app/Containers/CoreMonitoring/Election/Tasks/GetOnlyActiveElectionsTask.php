<?php

namespace App\Containers\CoreMonitoring\Election\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Election\Data\Repositories\ElectionRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetOnlyActiveElectionsTask extends ParentTask
{
    public function __construct(
        protected ElectionRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->repository->findWhere([
            ['status','IN', ['active']]
        ])->all();
    }
}
