<?php

namespace App\Containers\CoreMonitoring\Analysis\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Analysis\Tasks\ListAnalysesTask;
use App\Containers\CoreMonitoring\Analysis\UI\WEB\Requests\ListAnalysesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListAnalysesAction extends ParentAction
{
    public function __construct(
        private readonly ListAnalysesTask $listAnalysesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListAnalysesRequest $request): mixed
    {
        return $this->listAnalysesTask->run();
    }
}
