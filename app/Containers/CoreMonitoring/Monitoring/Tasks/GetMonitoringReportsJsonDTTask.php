<?php

namespace App\Containers\CoreMonitoring\Monitoring\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Analysis\Data\Repositories\AnalysisReportRepository;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetExecutedDataTableTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetInitialDataTableTask;
use App\Containers\CoreMonitoring\Monitoring\Data\Repositories\MonitoringReportRepository;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMonitoringReportsJsonDTTask extends ParentTask
{
    public function __construct(
        protected MonitoringReportRepository $repository,
        protected AnalysisReportRepository $analysisRepository,
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

        $searchFieldStatus = $requestData['columns'][4]['search']['value'];
        $searchFieldElection = $requestData['columns'][2]['search']['value'];
        $searchFieldCode = $requestData['columns'][1]['search']['value'];

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

        $exclude = $this->analysisRepository->findWhere([
            ['scope_type','=', $scope_type],
            ['scope_department','=', $scope_department]
        ])->pluck('fid_monitoring_report')->toArray();

        $result = $this->repository->scopeQuery(
            function ($query) use (
                $searchValue,
                $searchFieldCode,
                $searchFieldElection,
                $searchFieldStatus,
                $user,
                $scope_type,
                $scope_department,
                $exclude
            ) {

                $query = $query->join('elections', 'monitoring_reports.fid_election', 'elections.id');
                $query = $query->join('users', 'monitoring_reports.created_by', 'users.id');
                $query = $query->join(
                    'monitoring_items',
                    'monitoring_reports.fid_monitoring_item',
                    'monitoring_items.id'
                );

                if (! empty($searchValue)) {
                    $query = $query->where('monitoring_reports.code', 'like', '%'.$searchValue.'%');
                }

                if (! empty($searchFieldCode)) {
                    $query = $query->where('monitoring_reports.code', 'like', '%'.$searchFieldCode.'%');
                }

                if (! empty($searchFieldElection)) {
                    $query = $query->where('monitoring_reports.fid_election', '=', $searchFieldElection);
                }

                if (! empty($searchFieldStatus)) {
                    $query = $query->where('monitoring_reports.status', '=', $searchFieldStatus);
                }

                if (!empty($scope_type) && !empty($scope_department)) {
                    $query = $query->where('monitoring_reports.scope_type', '=', $scope_type)
                                    ->where('monitoring_reports.scope_department', '=', $scope_department);
                }

                $query = $query->whereNotIn('monitoring_reports.status', ['NEW']);

                $query = $query->whereNotIn('monitoring_reports.id', $exclude);

                return $query->distinct()->select([
                    'monitoring_reports.*',
                    'elections.name as election_name',
                    'elections.code as election_code',
                    'users.name as user_name',
                    'monitoring_items.other_media as media_name'
                ]);
            }
        );

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
