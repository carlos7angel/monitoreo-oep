<?php

namespace App\Containers\CoreMonitoring\Analysis\Actions;

use App\Containers\CoreMonitoring\Analysis\Models\Analysis;
use App\Containers\CoreMonitoring\Analysis\Tasks\FindAnalysisByIdTask;
use App\Containers\CoreMonitoring\Analysis\UI\WEB\Requests\FindAnalysisByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindAnalysisByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindAnalysisByIdTask $findAnalysisByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindAnalysisByIdRequest $request): Analysis
    {
        return $this->findAnalysisByIdTask->run($request->id);
    }
}
