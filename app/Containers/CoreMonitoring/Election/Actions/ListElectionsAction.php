<?php

namespace App\Containers\CoreMonitoring\Election\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Election\Tasks\ListElectionsTask;
use App\Containers\CoreMonitoring\Election\UI\WEB\Requests\ListElectionsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListElectionsAction extends ParentAction
{
    public function __construct(
        private readonly ListElectionsTask $listElectionsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListElectionsRequest $request): mixed
    {
        return $this->listElectionsTask->run();
    }
}
