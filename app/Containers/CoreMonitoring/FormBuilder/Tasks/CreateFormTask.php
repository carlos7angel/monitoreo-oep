<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Tasks;

use App\Containers\CoreMonitoring\FormBuilder\Data\Repositories\FormRepository;
use App\Containers\CoreMonitoring\FormBuilder\Models\Form;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateFormTask extends ParentTask
{
    protected FormRepository $repository;

    public function __construct(FormRepository $_repository)
    {
        $this->repository = $_repository;
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Form
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
