<?php

namespace App\Containers\CoreMonitoring\Registration\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Registration\Tasks\ListRegistrationsTask;
use App\Containers\CoreMonitoring\Registration\UI\WEB\Requests\ListRegistrationsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListRegistrationsAction extends ParentAction
{
    public function __construct(
        private readonly ListRegistrationsTask $listRegistrationsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListRegistrationsRequest $request): mixed
    {
        return $this->listRegistrationsTask->run();
    }
}
