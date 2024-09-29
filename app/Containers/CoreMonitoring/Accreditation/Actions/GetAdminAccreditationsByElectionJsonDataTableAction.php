<?php

namespace App\Containers\CoreMonitoring\Accreditation\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Accreditation\Tasks\GetAdminAccreditationsByElectionJsonDataTableTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAdminAccreditationsByElectionJsonDataTableAction extends ParentAction
{
    public function __construct(
        private GetAdminAccreditationsByElectionJsonDataTableTask $task,
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
