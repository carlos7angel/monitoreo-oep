<?php

namespace App\Containers\CoreMonitoring\Accreditation\Tasks;

use App\Containers\CoreMonitoring\Accreditation\Data\Repositories\AccreditationRepository;
use App\Containers\CoreMonitoring\Accreditation\Models\Accreditation;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateAccreditationTask extends ParentTask
{
    public function __construct(
        protected AccreditationRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Accreditation
    {
//        try {
            return $this->repository->create($data);
//        } catch (\Exception) {
//            throw new CreateResourceFailedException();
//        }
    }
}
