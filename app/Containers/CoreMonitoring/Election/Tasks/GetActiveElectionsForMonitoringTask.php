<?php

namespace App\Containers\CoreMonitoring\Election\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Election\Data\Repositories\ElectionRepository;
use App\Containers\CoreMonitoring\Registration\Data\Repositories\RegistrationRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetActiveElectionsForMonitoringTask extends ParentTask
{
    public function __construct(
        protected ElectionRepository $electionRepository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');
        $nowDate = date('Y-m-d');
        return $this->electionRepository->findWhere([
            ['status','IN', ['active', 'published']],
            ['enable_for_monitoring', '=', '1'],
        ])->all();
    }
}
