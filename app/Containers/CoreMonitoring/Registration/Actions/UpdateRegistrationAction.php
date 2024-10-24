<?php

namespace App\Containers\CoreMonitoring\Registration\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\CoreMonitoring\Registration\Models\Registration;
use App\Containers\CoreMonitoring\Registration\Tasks\UpdateRegistrationTask;
use App\Containers\CoreMonitoring\Registration\UI\WEB\Requests\UpdateRegistrationRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateRegistrationAction extends ParentAction
{
    public function __construct(
        private UpdateRegistrationTask $updateRegistrationTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateRegistrationRequest $request): Registration
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateRegistrationTask->run($data, $request->id);
    }
}
