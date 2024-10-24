<?php

namespace App\Containers\CoreMonitoring\Registration\Tasks;

use App\Containers\CoreMonitoring\Registration\Data\Repositories\RegistrationRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindRegistrationByElectionAndProfileTask extends ParentTask
{
    public function __construct(
        protected RegistrationRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($election_id, $profile_id, $user_id): mixed
    {
        return $this->repository->findWhere([
            'fid_election' => $election_id,
            'fid_user' => $user_id,
            'fid_political_group_profile' => $profile_id
        ])->all();
    }
}
