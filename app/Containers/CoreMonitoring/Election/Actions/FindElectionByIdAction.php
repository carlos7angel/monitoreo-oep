<?php

namespace App\Containers\CoreMonitoring\Election\Actions;

use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class FindElectionByIdAction extends ParentAction
{
    public function __construct(
        private FindElectionByIdTask $findElectionByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(Request $request): Election
    {
        return $this->findElectionByIdTask->run($request->id);
    }
}
