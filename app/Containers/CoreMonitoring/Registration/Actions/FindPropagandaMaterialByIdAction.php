<?php

namespace App\Containers\CoreMonitoring\Registration\Actions;

use App\Containers\CoreMonitoring\Registration\Models\PropagandaMaterial;
use App\Containers\CoreMonitoring\Registration\Tasks\FindPropagandaMaterialByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class FindPropagandaMaterialByIdAction extends ParentAction
{
    public function __construct(
        private FindPropagandaMaterialByIdTask $findPropagandaMaterialByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(Request $request): PropagandaMaterial
    {
        return $this->findPropagandaMaterialByIdTask->run($request->id);
    }
}
