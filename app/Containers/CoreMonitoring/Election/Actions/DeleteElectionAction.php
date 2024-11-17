<?php

namespace App\Containers\CoreMonitoring\Election\Actions;

use App\Containers\CoreMonitoring\Election\Tasks\DeleteElectionTask;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class DeleteElectionAction extends ParentAction
{
    public function __construct(
        private DeleteElectionTask $deleteElectionTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(Request $request): int
    {
        return $this->deleteElectionTask->run($request->id);
    }
}
