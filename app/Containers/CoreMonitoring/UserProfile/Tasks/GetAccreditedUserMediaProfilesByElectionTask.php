<?php

namespace App\Containers\CoreMonitoring\UserProfile\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Accreditation\Data\Repositories\AccreditationRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAccreditedUserMediaProfilesByElectionTask extends ParentTask
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
        $result = $this->repository->scopeQuery(function ($query) use ($election_id) {
            $query = $query->join('media_profiles', 'media_accreditations.fid_media_profile', 'media_profiles.id');
            $query = $query->where('fid_election', $election_id);
            $query = $query->where('media_accreditations.status', 'accredited');
            return $query->distinct()->select(['media_profiles.*']);
        });

        // $result->orderBy($sortColumn, $sortColumnDir);

        return $result->all();
    }
}
