<?php

namespace App\Containers\CoreMonitoring\Registration\Actions;

use App\Containers\CoreMonitoring\Registration\Models\Registration;
use App\Containers\CoreMonitoring\Registration\Tasks\FindRegistrationByIdTask;
use App\Containers\CoreMonitoring\Registration\UI\WEB\Requests\FindRegistrationByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindRegistrationByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindRegistrationByIdTask $findRegistrationByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindRegistrationByIdRequest $request): Registration
    {
        return $this->findRegistrationByIdTask->run($request->id);
    }
}
