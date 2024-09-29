<?php

namespace App\Containers\CoreMonitoring\UserProfile\Tasks;

use App\Containers\CoreMonitoring\UserProfile\Data\Repositories\MediaProfileRepository;
use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindUserMediaProfileByIdTask extends ParentTask
{
    public function __construct(
        protected readonly MediaProfileRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): MediaProfile
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
