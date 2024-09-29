<?php

namespace App\Containers\AppSection\User\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\User\Tasks\GetAllUsersJsonDataTableTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUsersJsonDataTableAction extends ParentAction
{
    public function __construct(
        private GetAllUsersJsonDataTableTask $task,
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
