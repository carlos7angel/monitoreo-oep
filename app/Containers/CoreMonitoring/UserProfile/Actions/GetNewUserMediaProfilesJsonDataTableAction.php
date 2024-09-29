<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\UserProfile\Tasks\GetNewUserMediaProfilesJsonDataTableTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;use Prettus\Repository\Exceptions\RepositoryException;

class GetNewUserMediaProfilesJsonDataTableAction extends ParentAction
{
    public function __construct(
        private GetNewUserMediaProfilesJsonDataTableTask $getUserMediaProfilesJsonDataTableTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
        return $this->getUserMediaProfilesJsonDataTableTask->run($request);
    }
}
