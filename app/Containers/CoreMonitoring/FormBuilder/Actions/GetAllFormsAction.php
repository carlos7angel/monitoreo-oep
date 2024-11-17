<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;
use App\Ship\Parents\Requests\Request;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\ListFormsTask;

class GetAllFormsAction extends ParentAction
{
    public function __construct(
        private ListFormsTask $listFormsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
        return $this->listFormsTask->addRequestCriteria()->run($skipPaginate = true);
    }
}
