<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\GetAllFieldTypesTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;
use App\Ship\Parents\Requests\Request;

class GetAllFieldTypesAction extends ParentAction
{
    public function __construct(
        private GetAllFieldTypesTask $getAllFieldTypesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
        return $this->getAllFieldTypesTask->run();
    }
}
