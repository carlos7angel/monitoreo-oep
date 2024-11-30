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

class GetAnalysisReportsByAnalystJsonDtTask extends ParentTask
{
    public function __construct(
        protected AnalysisReportRepository $analysisReportRepository,
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

        $searchFieldCode = $requestData['columns'][1]['search']['value'];
        $searchFieldElection = $requestData['columns'][2]['search']['value'];
        $searchFieldStatus = $requestData['columns'][5]['search']['value'];

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $scope_type = $scope_department = null;
        if ($user->type === 'TSE' || empty($user->type)) {
            $scope_type = 'TSE';
            $scope_department = 'Nacional';
        }
        if ($user->type === 'TED') {
            $scope_type = 'TED';
            $scope_department = $user->department;
        }

        $result = $this->analysisReportRepository->scopeQuery(function ($query) use (
            $searchValue, $searchFieldCode, $searchFieldElection,
            $searchFieldStatus, $user, $scope_type, $scope_department
        ) {

            $query = $query->leftJoin('elections', 'analysis_reports.fid_election', 'elections.id');

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
            $query = $query->leftJoin('users', 'analysis_report_status_activity.registered_by', 'users.id');


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

            if (!empty($scope_type) && !empty($scope_department)) {
                $query = $query->where('analysis_reports.scope_type', '=', $scope_type)
                    ->where('analysis_reports.scope_department', '=', $scope_department);
            }

            // $query = $query->whereIn('analysis_reports.status', []);

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
