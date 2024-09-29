<?php

namespace App\Containers\CoreMonitoring\Accreditation\Actions;

use App\Containers\CoreMonitoring\Accreditation\Tasks\DeleteAccreditationTask;
use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Requests\DeleteAccreditationRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteAccreditationAction extends ParentAction
{
    public function __construct(
        private readonly DeleteAccreditationTask $deleteAccreditationTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteAccreditationRequest $request): int
    {
        return $this->deleteAccreditationTask->run($request->id);
    }
}
