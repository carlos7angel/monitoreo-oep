<?php

namespace App\Containers\CoreMonitoring\Election\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Election\Data\Repositories\ElectionRepository;
use App\Ship\Criterias\OrderByCreationDateDescendingCriteria;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListElectionsTask extends ParentTask
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
        $this->repository->pushCriteria(new OrderByCreationDateDescendingCriteria());

        return $this->repository->findWhere([
            ['status','IN', ['active', 'published', 'finished']]
        ])->all();

        //return $this->repository->addRequestCriteria()->paginate();
    }
}
