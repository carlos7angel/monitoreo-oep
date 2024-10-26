<?php

namespace App\Containers\CoreMonitoring\Analysis\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\CoreMonitoring\Analysis\Models\AnalysisReport;
use App\Containers\CoreMonitoring\Analysis\Tasks\UpdateAnalysisTask;
use App\Containers\CoreMonitoring\Analysis\UI\WEB\Requests\UpdateAnalysisRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateAnalysisAction extends ParentAction
{
    public function __construct(
        private readonly UpdateAnalysisTask $updateAnalysisTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateAnalysisRequest $request): AnalysisReport
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateAnalysisTask->run($data, $request->id);
    }
}
