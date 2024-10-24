<?php

namespace App\Containers\CoreMonitoring\Election\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Election\Data\Repositories\ElectionRepository;
use App\Containers\CoreMonitoring\Registration\Data\Repositories\RegistrationRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetActiveElectionsForPoliticalRegistrationTask extends ParentTask
{
    public function __construct(
        protected ElectionRepository $electionRepository,
        protected RegistrationRepository $registrationRepository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($profile_id): mixed
    {
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $exclude = $this->registrationRepository
            ->findWhere([
                ['fid_political_group_profile','=', $profile_id],
            ])->pluck('fid_election')->toArray();

        $nowDate = date('Y-m-d');
        return $this->electionRepository->findWhere([
            ['status','IN', ['active', 'published']],
            ['enable_for_political_registration', '=', '1'],
            ['id', 'NOTIN', $exclude]
        ])->all();
    }
}
