<?php

namespace App\Containers\CoreMonitoring\Catalog\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\CoreMonitoring\Catalog\Models\Catalog;
use App\Containers\CoreMonitoring\Catalog\Tasks\CreateCatalogTask;
use App\Containers\CoreMonitoring\Catalog\UI\WEB\Requests\CreateCatalogRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateCatalogAction extends ParentAction
{
    public function __construct(
        private readonly CreateCatalogTask $createCatalogTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateCatalogRequest $request): Catalog
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createCatalogTask->run($data);
    }
}
