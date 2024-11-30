<?php

namespace App\Containers\CoreMonitoring\Election\Tasks;

use App\Containers\CoreMonitoring\Election\Data\Repositories\ElectionRepository;
use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateElectionTask extends ParentTask
{
    public function __construct(
        protected readonly ElectionRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Election
    {
        //        try {
        return $this->repository->create($data);
        //        } catch (\Exception) {
        //            throw new CreateResourceFailedException();
        //        }
    }
}
