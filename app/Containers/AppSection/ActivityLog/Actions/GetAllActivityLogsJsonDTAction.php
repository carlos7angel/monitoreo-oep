<?php

namespace App\Containers\AppSection\ActivityLog\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ActivityLog\Tasks\GetAllActivityLogsJsonDTTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllActivityLogsJsonDTAction extends ParentAction
{
    public function __construct(
        private GetAllActivityLogsJsonDTTask $getAllActivityLogsJsonDTTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
        return $this->getAllActivityLogsJsonDTTask->run($request);
    }
}
