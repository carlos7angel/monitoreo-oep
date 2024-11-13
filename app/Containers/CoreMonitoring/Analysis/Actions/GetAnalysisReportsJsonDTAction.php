<?php

namespace App\Containers\CoreMonitoring\Analysis\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Analysis\Tasks\GetAnalysisReportsByAnalystJsonDtTask;
use App\Containers\CoreMonitoring\Analysis\Tasks\GetAnalysisReportsByPlenaryJsonDtTask;
use App\Containers\CoreMonitoring\Analysis\Tasks\GetAnalysisReportsBySecretariatJsonDtTask;
use App\Containers\CoreMonitoring\Analysis\Tasks\GetAnalysisReportsJsonDTTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAnalysisReportsJsonDTAction extends ParentAction
{
    public function __construct(
        private GetAnalysisReportsJsonDTTask $getAnalysisReportsJsonDTTask,
        private GetAnalysisReportsByAnalystJsonDtTask $getAnalysisReportsByAnalystJsonDtTask,
        private GetAnalysisReportsBySecretariatJsonDtTask $getAnalysisReportsBySecretariatJsonDtTask,
        private GetAnalysisReportsByPlenaryJsonDtTask $getAnalysisReportsByPlenaryJsonDtTask,
        private GetAuthenticatedUserByGuardTask $getAuthenticatedUserByGuardTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
        $user = $this->getAuthenticatedUserByGuardTask->run('web');

        if ($user->hasRole('analyst')) {
            return $this->getAnalysisReportsByAnalystJsonDtTask->run($request);
        }

        if ($user->hasRole('secretariat')) {
            return $this->getAnalysisReportsBySecretariatJsonDtTask->run($request);
        }

        if ($user->hasRole('plenary')) {
            return $this->getAnalysisReportsByPlenaryJsonDtTask->run($request);
        }

        if ($user->hasRole('super') || $user->hasRole('admin')) {
            return $this->getAnalysisReportsJsonDTTask->run($request);
        }

        return null;
    }
}
