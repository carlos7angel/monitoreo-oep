<?php

namespace App\Containers\CoreMonitoring\Catalog\Tasks;

use App\Containers\CoreMonitoring\Catalog\Data\Repositories\CatalogRepository;
use App\Containers\CoreMonitoring\Catalog\Models\Catalog;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateCatalogTask extends ParentTask
{
    public function __construct(
        protected readonly CatalogRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Catalog
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
