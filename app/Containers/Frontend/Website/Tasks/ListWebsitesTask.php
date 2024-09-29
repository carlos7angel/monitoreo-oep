<?php

namespace App\Containers\Frontend\Website\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Frontend\Website\Data\Repositories\WebsiteRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListWebsitesTask extends ParentTask
{
    public function __construct(
        protected readonly WebsiteRepository $repository,
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
