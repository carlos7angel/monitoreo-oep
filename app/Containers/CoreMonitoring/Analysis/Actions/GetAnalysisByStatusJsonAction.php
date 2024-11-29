<?php

namespace App\Containers\CoreMonitoring\Analysis\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\CoreMonitoring\Analysis\Tasks\GetAnalysisByStatusJsonTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;


class GetAnalysisByStatusJsonAction extends ParentAction
{
    public function __construct(
        private GetAnalysisByStatusJsonTask $task
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): mixed
    {
        return $this->task->run($request->id);

    }
}
