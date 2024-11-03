<?php

namespace App\Containers\CoreMonitoring\Registration\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Registration\Data\Repositories\RegistrationRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListRegistrationsByElectionTask extends ParentTask
{
    public function __construct(
        protected RegistrationRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($id): mixed
    {
        return $this->repository->findWhere([
            'fid_election' => $id
        ])->all();
    }
}
