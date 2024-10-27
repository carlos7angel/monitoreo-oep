<?php

namespace App\Containers\CoreMonitoring\Monitoring\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Monitoring\Data\Repositories\MonitoringReportRepository;
use App\Ship\Criterias\SkipTakeCriteria;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMonitoringReportsJsonDTTask extends ParentTask
{
    public function __construct(
        protected MonitoringReportRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
        $requestData = $request->all();
        $draw = $requestData['draw'];
        $start = $requestData['start'];
        $length = $requestData['length'];
        $sortColumn = $sortColumnDir = null;
        if(isset($requestData['order'])) {
            $indexSort = $requestData['order'][0]['column'];
            $sortColumn = $requestData['columns'][$indexSort]['name'];
            $sortColumnDir = $requestData['order'][0]['dir'];
        }
        $searchValue = $requestData['search']['value'];
        $pageSize = $length != null ? intval($length) : 0;
        $skip = $start != null ? intval($start) : 0;

        $searchFieldCode = $requestData['columns'][1]['search']['value'];
        $searchFieldElection = $requestData['columns'][2]['search']['value'];
        $searchFieldStatus = $requestData['columns'][4]['search']['value'];

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $result = $this->repository->scopeQuery(function ($query) use ($searchValue, $searchFieldCode, $searchFieldElection, $searchFieldStatus, $user) {

            $query = $query->join('elections', 'monitoring_reports.fid_election', 'elections.id');
            $query = $query->join('users', 'monitoring_reports.created_by', 'users.id');

            if(! empty($searchValue)) {
                $query = $query->where('monitoring_reports.code', 'like', '%'.$searchValue.'%');
            }

            if(! empty($searchFieldCode)) {
                $query = $query->where('monitoring_reports.code', 'like', '%'.$searchFieldCode.'%');
            }

            if(! empty($searchFieldElection)) {
                $query = $query->where('monitoring_reports.fid_election', '=', $searchFieldElection);
            }

            if(! empty($searchFieldStatus)) {
                $query = $query->where('monitoring_reports.status', '=', $searchFieldStatus);
            }

            // if ($user->roles->first()->name === 'media') {
            //     $query = $query->where('media_profiles.coverage', '=', $user->department);
            // }

            if ($user) {
                if ($user->type === 'TSE' || empty($user->type)) {
                    $query = $query->where('monitoring_reports.scope_type', '=', 'TSE')
                                    ->where('monitoring_reports.scope_department', '=', 'Nacional');
                }
                if ($user->type === 'TED') {
                    $query = $query->where('monitoring_reports.scope_type', '=', 'TED')
                                    ->where('monitoring_reports.scope_department', '=', $user->department);
                }
            }

            // $query = $query->whereIn('status', []);

            return $query->distinct()->select(['monitoring_reports.*', 'elections.name as election_name', 'elections.code as election_code', 'users.name as user_name',
                DB::raw('(select count(*) as total from monitoring_item_report where fid_monitoring_report = monitoring_reports.id) as records')]);
        });

        $recordsTotal =  (clone $result)->count();

        $result = $result->pushCriteria(new SkipTakeCriteria($skip, $pageSize));

        if($sortColumn != null && $sortColumn != "" && $sortColumnDir != null && $sortColumnDir != "") {
            $result->orderBy($sortColumn, $sortColumnDir);
        }

        $response = [
            'draw' => $draw,
            'recordsFiltered' => $recordsTotal,
            'recordsTotal' => $recordsTotal,
            'data' => $result->all()
        ];

        return $response;
    }
}
