<?php

namespace App\Containers\CoreMonitoring\Registration\Tasks;

use App\Containers\CoreMonitoring\Registration\Data\Repositories\PropagandaMaterialRepository;
use App\Containers\CoreMonitoring\Registration\Models\PropagandaMaterial;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindPropagandaMaterialByIdTask extends ParentTask
{
    public function __construct(
        protected PropagandaMaterialRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): PropagandaMaterial
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
