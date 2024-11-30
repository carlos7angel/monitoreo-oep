<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Tasks;

use App\Containers\CoreMonitoring\FormBuilder\Data\Repositories\FormRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class ListFormsTask extends ParentTask
{
    protected FormRepository $repository;

    public function __construct(FormRepository $_repository)
    {
        $this->repository = $_repository;
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run($skipPaginate = false): mixed
    {
        return $skipPaginate ? $this->repository->all() : $this->repository->paginate(); // addRequestCriteria()
    }
}
