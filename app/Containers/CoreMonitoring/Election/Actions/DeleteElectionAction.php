<?php

namespace App\Containers\CoreMonitoring\Election\Actions;

use App\Containers\CoreMonitoring\Election\Tasks\DeleteElectionTask;
use App\Containers\CoreMonitoring\Election\UI\WEB\Requests\DeleteElectionRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteElectionAction extends ParentAction
{
    public function __construct(
        private readonly DeleteElectionTask $deleteElectionTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteElectionRequest $request): int
    {
        return $this->deleteElectionTask->run($request->id);
    }
}
