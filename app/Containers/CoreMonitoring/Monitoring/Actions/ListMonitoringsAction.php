<?php

namespace App\Containers\CoreMonitoring\Monitoring\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Monitoring\Tasks\ListMonitoringsTask;
use App\Containers\CoreMonitoring\Monitoring\UI\WEB\Requests\ListMonitoringsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListMonitoringsAction extends ParentAction
{
    public function __construct(
        private readonly ListMonitoringsTask $listMonitoringsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListMonitoringsRequest $request): mixed
    {
        return $this->listMonitoringsTask->run();
    }
}
