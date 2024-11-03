<?php

namespace App\Containers\AppSection\ActivityLog\Actions;

use App\Containers\AppSection\ActivityLog\Models\ActivityLog;
use App\Containers\AppSection\ActivityLog\Tasks\FindActivityLogByIdTask;
use App\Containers\AppSection\ActivityLog\UI\WEB\Requests\FindActivityLogByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindActivityLogByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindActivityLogByIdTask $findActivityLogByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindActivityLogByIdRequest $request): ActivityLog
    {
        return $this->findActivityLogByIdTask->run($request->id);
    }
}
