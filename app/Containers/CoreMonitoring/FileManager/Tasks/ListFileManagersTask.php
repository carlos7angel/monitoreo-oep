<?php

namespace App\Containers\CoreMonitoring\FileManager\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\FileManager\Data\Repositories\FileRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListFileManagersTask extends ParentTask
{
    public function __construct(
        protected readonly FileManagerRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->repository->addRequestCriteria()->paginate();
    }
}
