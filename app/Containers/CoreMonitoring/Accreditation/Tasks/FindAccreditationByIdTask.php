<?php

namespace App\Containers\CoreMonitoring\Accreditation\Tasks;

use App\Containers\CoreMonitoring\Accreditation\Data\Repositories\AccreditationRepository;
use App\Containers\CoreMonitoring\Accreditation\Models\Accreditation;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindAccreditationByIdTask extends ParentTask
{
    public function __construct(
        protected AccreditationRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Accreditation
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
