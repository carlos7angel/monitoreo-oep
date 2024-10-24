<?php

namespace App\Containers\CoreMonitoring\Analysis\Actions;

use App\Containers\CoreMonitoring\Analysis\Tasks\DeleteAnalysisTask;
use App\Containers\CoreMonitoring\Analysis\UI\WEB\Requests\DeleteAnalysisRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteAnalysisAction extends ParentAction
{
    public function __construct(
        private readonly DeleteAnalysisTask $deleteAnalysisTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteAnalysisRequest $request): int
    {
        return $this->deleteAnalysisTask->run($request->id);
    }
}
