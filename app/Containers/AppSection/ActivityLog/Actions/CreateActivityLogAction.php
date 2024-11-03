<?php

namespace App\Containers\AppSection\ActivityLog\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Models\ActivityLog;
use App\Containers\AppSection\ActivityLog\Tasks\CreateActivityLogTask;
use App\Containers\AppSection\ActivityLog\UI\WEB\Requests\CreateActivityLogRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateActivityLogAction extends ParentAction
{
    public function __construct(
        private readonly CreateActivityLogTask $createActivityLogTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateActivityLogRequest $request): mixed
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createActivityLogTask->run($data);
    }
}
