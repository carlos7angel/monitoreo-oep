<?php

namespace App\Containers\CoreMonitoring\Analysis\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Analysis\Data\Repositories\ActivityAnalysisReportRepository;
use App\Ship\Criterias\OrderByCreationDateDescendingCriteria;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetActivitiesByAnalysisReportTask extends ParentTask
{
    public function __construct(
        protected ActivityAnalysisReportRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($analysis_report_id): mixed
    {
        $this->repository->pushCriteria(new OrderByCreationDateDescendingCriteria());

        $result = $this->repository->findWhere([
            'fid_analysis_report' => $analysis_report_id
        ]);

        return $result->all();
    }
}
