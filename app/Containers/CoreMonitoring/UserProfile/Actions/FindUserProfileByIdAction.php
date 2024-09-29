<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Containers\CoreMonitoring\UserProfile\Tasks\FindUserProfileByIdTask;
use App\Containers\CoreMonitoring\UserProfile\UI\WEB\Requests\FindUserProfileByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindUserProfileByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindUserProfileByIdTask $findUserProfileByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindUserProfileByIdRequest $request): MediaProfile
    {
        return $this->findUserProfileByIdTask->run($request->id);
    }
}
