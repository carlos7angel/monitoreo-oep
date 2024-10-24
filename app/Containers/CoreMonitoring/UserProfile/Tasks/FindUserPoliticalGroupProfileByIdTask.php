<?php

namespace App\Containers\CoreMonitoring\UserProfile\Tasks;

use App\Containers\CoreMonitoring\UserProfile\Data\Repositories\PoliticalGroupProfileRepository;
use App\Containers\CoreMonitoring\UserProfile\Models\PoliticalGroupProfile;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindUserPoliticalGroupProfileByIdTask extends ParentTask
{
    public function __construct(
        protected PoliticalGroupProfileRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): PoliticalGroupProfile
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
