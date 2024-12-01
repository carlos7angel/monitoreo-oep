<?php

namespace App\Containers\CoreMonitoring\Catalog\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Catalog\Data\Repositories\CatalogRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListCatalogsTask extends ParentTask
{
    public function __construct(
        protected CatalogRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($skipPagination = false): mixed
    {
        return $skipPagination
            ? $this->repository->addRequestCriteria()->all()
            : $this->repository->addRequestCriteria()->paginate();
    }
}
