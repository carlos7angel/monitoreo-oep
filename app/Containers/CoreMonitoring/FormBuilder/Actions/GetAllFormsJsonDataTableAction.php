<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\GetAllFormsJsonDataTableTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;
use App\Ship\Parents\Requests\Request;

class GetAllFormsJsonDataTableAction extends ParentAction
{
    public function __construct(
        private GetAllFormsJsonDataTableTask $task,
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
