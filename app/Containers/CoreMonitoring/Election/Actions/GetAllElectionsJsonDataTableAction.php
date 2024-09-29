<?php

namespace App\Containers\CoreMonitoring\Election\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Election\Tasks\GetAllElectionsJsonDataTableTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;
use App\Ship\Parents\Requests\Request;

class GetAllElectionsJsonDataTableAction extends ParentAction
{
    public function __construct(
        private GetAllElectionsJsonDataTableTask $task,
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
