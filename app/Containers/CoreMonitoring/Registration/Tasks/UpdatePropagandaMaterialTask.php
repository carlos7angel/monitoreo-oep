<?php

namespace App\Containers\CoreMonitoring\Registration\Tasks;

use App\Containers\CoreMonitoring\Registration\Data\Repositories\PropagandaMaterialRepository;
use App\Containers\CoreMonitoring\Registration\Models\PropagandaMaterial;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdatePropagandaMaterialTask extends ParentTask
{
    public function __construct(
        protected PropagandaMaterialRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): PropagandaMaterial
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
