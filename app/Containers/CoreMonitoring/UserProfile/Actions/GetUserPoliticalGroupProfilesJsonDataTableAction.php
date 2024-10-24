<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\UserProfile\Tasks\GetUserPoliticalGroupProfilesJsonDataTableTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;use Prettus\Repository\Exceptions\RepositoryException;

class GetUserPoliticalGroupProfilesJsonDataTableAction extends ParentAction
{
    public function __construct(
        private GetUserPoliticalGroupProfilesJsonDataTableTask $task,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
        return $this->task->run($request);
    }
}
