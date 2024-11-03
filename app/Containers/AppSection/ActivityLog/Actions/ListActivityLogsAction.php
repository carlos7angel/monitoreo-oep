<?php

namespace App\Containers\AppSection\ActivityLog\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ActivityLog\Tasks\ListActivityLogsTask;
use App\Containers\AppSection\ActivityLog\UI\WEB\Requests\ListActivityLogsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListActivityLogsAction extends ParentAction
{
    public function __construct(
        private readonly ListActivityLogsTask $listActivityLogsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListActivityLogsRequest $request): mixed
    {
        return $this->listActivityLogsTask->run();
    }
}
