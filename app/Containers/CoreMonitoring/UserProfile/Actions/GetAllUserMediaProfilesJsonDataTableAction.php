<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\UserProfile\Tasks\GetAllUserMediaProfilesJsonDataTableTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUserMediaProfilesJsonDataTableAction extends ParentAction
{
    public function __construct(
        private GetAllUserMediaProfilesJsonDataTableTask $getUserMediaProfilesJsonDataTableTask,
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
