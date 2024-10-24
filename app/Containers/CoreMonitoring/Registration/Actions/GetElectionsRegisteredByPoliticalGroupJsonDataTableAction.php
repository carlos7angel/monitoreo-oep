<?php

namespace App\Containers\CoreMonitoring\Registration\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Registration\Tasks\GetElectionsRegisteredByPoliticalGroupJsonDataTableTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Prettus\Repository\Exceptions\RepositoryException;

class GetElectionsRegisteredByPoliticalGroupJsonDataTableAction extends ParentAction
{
    public function __construct(
        private GetElectionsRegisteredByPoliticalGroupJsonDataTableTask $task,
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
