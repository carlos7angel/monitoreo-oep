<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Tasks;

use App\Containers\CoreMonitoring\FormBuilder\Data\Repositories\FieldRepository;
use App\Containers\CoreMonitoring\FormBuilder\Models\Field;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindFieldByIdTask extends ParentTask
{
    public function __construct(
        protected FieldRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Field
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
