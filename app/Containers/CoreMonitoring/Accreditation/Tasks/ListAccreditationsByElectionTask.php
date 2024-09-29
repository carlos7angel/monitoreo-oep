<?php

namespace App\Containers\CoreMonitoring\Accreditation\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Accreditation\Data\Repositories\AccreditationRepository;
use App\Ship\Criterias\SkipTakeCriteria;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListAccreditationsByElectionTask extends ParentTask
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
        $this->repository->pushCriteria(new SkipTakeCriteria(0, 10));

        $result = $this->repository->findWhere([
            'fid_election' => $election_id
        ])->all();


        return $result;

    }
}
