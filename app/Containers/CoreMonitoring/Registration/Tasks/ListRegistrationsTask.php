<?php

namespace App\Containers\CoreMonitoring\Registration\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Registration\Data\Repositories\RegistrationRepository;
use App\Ship\Criterias\SkipTakeCriteria;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListRegistrationsTask extends ParentTask
{
    public function __construct(
        protected RegistrationRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($election_id = null): mixed
    {
        if ($election_id) {
            $this->repository->pushCriteria(new SkipTakeCriteria(0, 10));

            $result = $this->repository->findWhere([
                'fid_election' => $election_id
            ])->all();

            return $result;
        }

        return $this->repository->addRequestCriteria()->paginate();
    }
}
