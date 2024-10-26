<?php

namespace App\Containers\CoreMonitoring\Analysis\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\CoreMonitoring\Analysis\Models\AnalysisReport;
use App\Containers\CoreMonitoring\Analysis\Tasks\CreateAnalysisTask;
use App\Containers\CoreMonitoring\Analysis\UI\WEB\Requests\CreateAnalysisRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateAnalysisAction extends ParentAction
{
    public function __construct(
        private readonly CreateAnalysisTask $createAnalysisTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateAnalysisRequest $request): AnalysisReport
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createAnalysisTask->run($data);
    }
}
