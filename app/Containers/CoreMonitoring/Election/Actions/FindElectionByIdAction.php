<?php

namespace App\Containers\CoreMonitoring\Election\Actions;

use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Containers\CoreMonitoring\Election\UI\WEB\Requests\FindElectionByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindElectionByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindElectionByIdTask $findElectionByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindElectionByIdRequest $request): Election
    {
        return $this->findElectionByIdTask->run($request->id);
    }
}
