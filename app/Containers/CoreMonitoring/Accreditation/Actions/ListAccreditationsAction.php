<?php

namespace App\Containers\CoreMonitoring\Accreditation\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Accreditation\Tasks\ListAccreditationsTask;
use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Requests\ListAccreditationsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListAccreditationsAction extends ParentAction
{
    public function __construct(
        private readonly ListAccreditationsTask $listAccreditationsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListAccreditationsRequest $request): mixed
    {
        return $this->listAccreditationsTask->run();
    }
}
