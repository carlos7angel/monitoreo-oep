<?php

namespace App\Containers\CoreMonitoring\Monitoring\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\GetOpenMonitoringItemsByElectionScopeTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Prettus\Repository\Exceptions\RepositoryException;

class ListAvailableMonitoringItemsAction extends ParentAction
{
    public function __construct(
        private GetOpenMonitoringItemsByElectionScopeTask $task,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
        $election = app(FindElectionByIdTask::class)->run($request->election_id);
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');
        $scope_type = $scope_department = null;
        if ($user->type === 'TSE' || empty($user->type)) {
            $scope_type = 'TSE';
            $scope_department = 'Nacional';
        }
        if ($user->type === 'TED') {
            $scope_type = $user->type ;
            $scope_department = $user->department;
        }

        return $this->task->run($election->id, $scope_type, $scope_department, $user);
    }
}
