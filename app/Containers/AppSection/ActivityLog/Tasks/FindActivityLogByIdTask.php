<?php

namespace App\Containers\AppSection\ActivityLog\Tasks;

use App\Containers\AppSection\ActivityLog\Data\Repositories\ActivityLogRepository;
use App\Containers\AppSection\ActivityLog\Models\ActivityLog;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindActivityLogByIdTask extends ParentTask
{
    public function __construct(
        protected ActivityLogRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ActivityLog
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
