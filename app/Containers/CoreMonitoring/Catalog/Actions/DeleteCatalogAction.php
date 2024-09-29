<?php

namespace App\Containers\CoreMonitoring\Catalog\Actions;

use App\Containers\CoreMonitoring\Catalog\Tasks\DeleteCatalogTask;
use App\Containers\CoreMonitoring\Catalog\UI\WEB\Requests\DeleteCatalogRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteCatalogAction extends ParentAction
{
    public function __construct(
        private readonly DeleteCatalogTask $deleteCatalogTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteCatalogRequest $request): int
    {
        return $this->deleteCatalogTask->run($request->id);
    }
}
