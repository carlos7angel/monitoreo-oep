<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Tasks;

use App\Containers\CoreMonitoring\FormBuilder\Data\Repositories\FieldTypeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetAllFieldTypesTask extends ParentTask
{
    protected FieldTypeRepository $repository;

    public function __construct(FieldTypeRepository $_repository)
    {
        $this->repository = $_repository;
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(): mixed
    {
        return $this->repository->findWhere([
            'active' => true
        ])->all();
    }
}
