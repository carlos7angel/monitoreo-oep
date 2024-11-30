<?php

namespace App\Containers\CoreMonitoring\Monitoring\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\CoreMonitoring\Monitoring\Tasks\GetMonitoringByScopeJsonTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class GetMonitoringByScopeJsonAction extends ParentAction
{
    public function __construct(
        private GetMonitoringByScopeJsonTask $task
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): mixed
    {
        return $this->task->run($request->id);
    }
}
