<?php

namespace App\Containers\CoreMonitoring\Monitoring\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Monitoring\Tasks\GetMonitoringByElectionJsonDataTableTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMonitoringByElectionJsonDataTableAction extends ParentAction
{
    public function __construct(
        private GetMonitoringByElectionJsonDataTableTask $task,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
        return $this->task->run($request);
    }
}
