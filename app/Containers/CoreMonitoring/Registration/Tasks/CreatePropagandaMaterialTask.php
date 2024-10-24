<?php

namespace App\Containers\CoreMonitoring\Registration\Tasks;

use App\Containers\CoreMonitoring\Registration\Data\Repositories\PropagandaMaterialRepository;
use App\Containers\CoreMonitoring\Registration\Models\PropagandaMaterial;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreatePropagandaMaterialTask extends ParentTask
{
    public function __construct(
        protected PropagandaMaterialRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): PropagandaMaterial
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
