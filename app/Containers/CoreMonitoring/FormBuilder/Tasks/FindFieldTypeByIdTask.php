<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Tasks;

use App\Containers\CoreMonitoring\FormBuilder\Data\Repositories\FieldTypeRepository;
use App\Containers\CoreMonitoring\FormBuilder\Models\FieldType;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindFieldTypeByIdTask extends ParentTask
{
    public function __construct(
        protected FieldTypeRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): FieldType
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
