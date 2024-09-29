<?php

namespace App\Containers\CoreMonitoring\FileManager\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\FileManager\Tasks\ListFileManagersTask;
use App\Containers\CoreMonitoring\FileManager\UI\WEB\Requests\ListFileManagersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListFileManagersAction extends ParentAction
{
    public function __construct(
        private readonly ListFileManagersTask $listFileManagersTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListFileManagersRequest $request): mixed
    {
        return $this->listFileManagersTask->run();
    }
}
