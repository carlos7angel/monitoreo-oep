<?php

namespace App\Containers\CoreMonitoring\Accreditation\Actions;

use App\Containers\CoreMonitoring\Accreditation\Models\Accreditation;
use App\Containers\CoreMonitoring\Accreditation\Tasks\FindAccreditationByIdTask;
use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Requests\FindAccreditationByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindAccreditationByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindAccreditationByIdTask $findAccreditationByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindAccreditationByIdRequest $request): Accreditation
    {
        return $this->findAccreditationByIdTask->run($request->id);
    }
}
