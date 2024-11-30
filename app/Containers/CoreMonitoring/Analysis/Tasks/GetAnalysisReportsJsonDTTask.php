<?php

namespace App\Containers\CoreMonitoring\Analysis\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Analysis\Data\Repositories\AnalysisReportRepository;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetExecutedDataTableTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetInitialDataTableTask;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAnalysisReportsJsonDTTask extends ParentTask
{
    public function __construct(
        protected AnalysisReportRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
        [$requestData, $draw, $sortColumn, $sortColumnDir, $pageSize, $skip, $searchValue] =
            app(GetInitialDataTableTask::class)->run($request);

        $searchFieldElection = $requestData['columns'][2]['search']['value'];
        $searchFieldStatus = $requestData['columns'][5]['search']['value'];

        $searchFieldCode = $requestData['columns'][1]['search']['value'];

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $result = $this->repository->scopeQuery(
            function ($query) use (
                $searchValue, $searchFieldCode, $searchFieldElection, $searchFieldStatus, $user
            ) {

            $query = $query
                ->leftJoin('elections', 'analysis_reports.fid_election', 'elections.id');

            $query = $query
                ->leftJoin('monitoring_reports', 'analysis_reports.fid_monitoring_report', 'monitoring_reports.id');
            $query = $query
                ->leftJoin('monitoring_items', 'monitoring_reports.fid_monitoring_item', 'monitoring_items.id');

            $query = $query
                ->leftJoin(
                    'analysis_report_status_activity',
                    'analysis_reports.fid_last_analysis_report_activity',
                    'analysis_report_status_activity.id'
                );
            $query = $query
                ->leftJoin('users', 'analysis_report_status_activity.registered_by', 'users.id');


            if (! empty($searchValue)) {
                $query = $query->where('analysis_reports.code', 'like', '%'.$searchValue.'%')
                                ->orWhere('elections.name', 'like', '%'.$searchValue.'%');
            }

            if (! empty($searchFieldCode)) {
                $query = $query->where('analysis_reports.code', 'like', '%'.$searchFieldCode.'%');
            }

            if (! empty($searchFieldElection)) {
                $query = $query->where('analysis_reports.fid_election', '=', $searchFieldElection);
            }

            if (! empty($searchFieldStatus)) {
                $query = $query->where('analysis_reports.status', '=', $searchFieldStatus);
            }

            return $query->distinct()->select([
                'analysis_reports.*',
                'elections.name as election_name',
                'elections.code as election_code',
                'monitoring_items.other_media as media_name',
                'monitoring_items.registered_media as media_registered',
                'analysis_report_status_activity.registered_at as activity_date',
                'users.name as activity_user',
            ]);
        });

        [$recordsTotal, $result] = app(GetExecutedDataTableTask::class)
            ->run($result, $sortColumn, $sortColumnDir, $skip, $pageSize);

        return [
            'draw' => $draw,
            'recordsFiltered' => $recordsTotal,
            'recordsTotal' => $recordsTotal,
            'data' => $result->all()
        ];
    }
}
