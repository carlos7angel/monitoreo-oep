<?php

namespace App\Containers\CoreMonitoring\Registration\Tasks;

use App\Containers\CoreMonitoring\Registration\Data\Repositories\RegistrationRepository;
use App\Containers\CoreMonitoring\Registration\Models\Registration;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindRegistrationByIdTask extends ParentTask
{
    public function __construct(
        protected RegistrationRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Registration
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
