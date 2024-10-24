<?php

namespace App\Containers\CoreMonitoring\Registration\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\CoreMonitoring\Registration\Models\Registration;
use App\Containers\CoreMonitoring\Registration\Tasks\CreateRegistrationTask;
use App\Containers\CoreMonitoring\Registration\UI\WEB\Requests\CreateRegistrationRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateRegistrationAction extends ParentAction
{
    public function __construct(
        private readonly CreateRegistrationTask $createRegistrationTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateRegistrationRequest $request): Registration
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createRegistrationTask->run($data);
    }
}
