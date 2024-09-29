<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use App\Containers\CoreMonitoring\UserProfile\Tasks\DeleteUserProfileTask;
use App\Containers\CoreMonitoring\UserProfile\UI\WEB\Requests\EnableUserMediaProfileAccountRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteUserProfileAction extends ParentAction
{
    public function __construct(
        private readonly DeleteUserProfileTask $deleteUserProfileTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(EnableUserMediaProfileAccountRequest $request): int
    {
        return $this->deleteUserProfileTask->run($request->id);
    }
}
