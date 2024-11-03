<?php

namespace App\Containers\AppSection\ActivityLog\Actions;

use App\Containers\AppSection\ActivityLog\Tasks\DeleteActivityLogTask;
use App\Containers\AppSection\ActivityLog\UI\WEB\Requests\DeleteActivityLogRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteActivityLogAction extends ParentAction
{
    public function __construct(
        private readonly DeleteActivityLogTask $deleteActivityLogTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteActivityLogRequest $request): int
    {
        return $this->deleteActivityLogTask->run($request->id);
    }
}
