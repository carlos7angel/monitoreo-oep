<?php

namespace App\Containers\CoreMonitoring\Registration\Actions;

use App\Containers\CoreMonitoring\Registration\Tasks\DeleteRegistrationTask;
use App\Containers\CoreMonitoring\Registration\UI\WEB\Requests\DeleteRegistrationRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteRegistrationAction extends ParentAction
{
    public function __construct(
        private readonly DeleteRegistrationTask $deleteRegistrationTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteRegistrationRequest $request): int
    {
        return $this->deleteRegistrationTask->run($request->id);
    }
}
