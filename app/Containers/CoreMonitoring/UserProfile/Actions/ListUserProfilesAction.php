<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\UserProfile\Tasks\ListUserProfilesTask;
use App\Containers\CoreMonitoring\UserProfile\UI\WEB\Requests\ListNewUserMediaProfilesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListUserProfilesAction extends ParentAction
{
    public function __construct(
        private readonly ListUserProfilesTask $listUserProfilesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListNewUserMediaProfilesRequest $request): mixed
    {
        return $this->listUserProfilesTask->run();
    }
}
