<?php

namespace App\Containers\AppSection\ActivityLog\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Models\ActivityLog;
use App\Containers\AppSection\ActivityLog\Tasks\UpdateActivityLogTask;
use App\Containers\AppSection\ActivityLog\UI\WEB\Requests\UpdateActivityLogRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateActivityLogAction extends ParentAction
{
    public function __construct(
        private readonly UpdateActivityLogTask $updateActivityLogTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateActivityLogRequest $request): ActivityLog
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateActivityLogTask->run($data, $request->id);
    }
}
