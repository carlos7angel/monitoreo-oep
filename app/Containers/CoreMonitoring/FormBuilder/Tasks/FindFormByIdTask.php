<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Tasks;

use App\Containers\CoreMonitoring\FormBuilder\Data\Repositories\FormRepository;
use App\Containers\CoreMonitoring\FormBuilder\Models\Form;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindFormByIdTask extends ParentTask
{
    public function __construct(
        protected FormRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Form
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
