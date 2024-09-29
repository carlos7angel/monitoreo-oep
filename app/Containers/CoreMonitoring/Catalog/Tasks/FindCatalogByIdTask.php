<?php

namespace App\Containers\CoreMonitoring\Catalog\Tasks;

use App\Containers\CoreMonitoring\Catalog\Data\Repositories\CatalogRepository;
use App\Containers\CoreMonitoring\Catalog\Models\Catalog;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindCatalogByIdTask extends ParentTask
{
    public function __construct(
        protected readonly CatalogRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Catalog
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
