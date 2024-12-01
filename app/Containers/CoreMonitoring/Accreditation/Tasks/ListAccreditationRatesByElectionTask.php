<?php

namespace App\Containers\CoreMonitoring\Accreditation\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Accreditation\Data\Repositories\AccreditationRateRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListAccreditationRatesByElectionTask extends ParentTask
{
    public function __construct(
        protected AccreditationRateRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($id): mixed
    {
        $result = $this->repository->scopeQuery(function ($query) use ($id) {
            $query = $query->join(
                'media_accreditations',
                'media_accreditation_rates.fid_accreditation',
                'media_accreditations.id'
            );
            $query = $query->where('media_accreditations.fid_election', $id);
            $query = $query->where('media_accreditations.status', 'accredited');
            return $query->distinct()->select(['media_accreditation_rates.*']);
        });
        return $result->all();

    }
}
