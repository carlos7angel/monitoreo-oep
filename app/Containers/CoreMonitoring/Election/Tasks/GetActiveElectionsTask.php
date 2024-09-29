<?php

namespace App\Containers\CoreMonitoring\Election\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Accreditation\Data\Repositories\AccreditationRepository;
use App\Containers\CoreMonitoring\Election\Data\Repositories\ElectionRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetActiveElectionsTask extends ParentTask
{
    public function __construct(
        protected ElectionRepository $electionRepository,
        protected AccreditationRepository $accreditationRepository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('external');
        $exclude = $this->accreditationRepository
            ->findWhere([
                ['fid_media_profile','=', $user->profile_data->id],
                ['status','IN', ['new', 'accredited', 'observed', 'rejected', 'archived']],
            ])->pluck('fid_election')->toArray();

        $nowDate = date('Y-m-d');
        return $this->electionRepository->findWhere([
            ['status','IN', ['active', 'published']],
            ['enable_for_media_registration', '=', '1'],
            ['start_date_media_registration', '<=', $nowDate],
            ['end_date_media_registration', '>=', $nowDate],
            ['id', 'NOTIN', $exclude]
        ])->all();
    }
}
