<?php

namespace App\Containers\CoreMonitoring\Accreditation\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Accreditation\Data\Repositories\AccreditationRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class CountAccreditationsByElectionTask extends ParentTask
{
    public function __construct(
        protected AccreditationRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($election_id): mixed
    {
        return $this->repository->findWhere(['fid_election' => $election_id])->count();
    }
}
