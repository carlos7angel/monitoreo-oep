<?php

namespace App\Containers\AppSection\ActivityLog\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ActivityLog\Data\Repositories\ActivityLogRepository;
use App\Ship\Criterias\SkipTakeCriteria;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllActivityLogsJsonDTTask extends ParentTask
{
    public function __construct(
        protected ActivityLogRepository $repository,
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
        $pageSize = $length != null ? intval($length) : 0;
        $skip = $start != null ? intval($start) : 0;

        $searchFieldType = $requestData['columns'][1]['search']['value'];
        $searchFieldDesc = $requestData['columns'][2]['search']['value'];
        $searchFieldStartDate = $requestData['columns'][4]['search']['value'];
        $searchFieldEndDate = $requestData['columns'][5]['search']['value'];

        $result = $this->repository->scopeQuery(function ($query) use ($searchFieldType, $searchFieldDesc, $searchFieldStartDate, $searchFieldEndDate) {

            $query = $query->join('users', 'activity_log.causer_id', 'users.id');

            if(! empty($searchFieldType)) {
                $query = $query->where('activity_log.log_name', '=', $searchFieldType);
            }

            if(! empty($searchFieldDesc)) {
                $query = $query->where('activity_log.description', 'like', '%'.$searchFieldDesc.'%');
            }

            if (!empty($searchFieldStartDate) && !empty($searchFieldEndDate)) {
                $searchStartDate = Carbon::createFromFormat('d/m/Y', $searchFieldStartDate)->format('Y-m-d');
                $searchEndDate = Carbon::createFromFormat('d/m/Y', $searchFieldEndDate)->format('Y-m-d');
                $query = $query->whereDate('activity_log.created_at', '>=', $searchStartDate)
                                ->whereDate('activity_log.created_at', '<=', $searchEndDate);
            } else {
                if(!empty($searchFieldStartDate)) {
                    $searchStartDate = Carbon::createFromFormat('d/m/Y', $searchFieldStartDate)->format('Y-m-d');
                    $query = $query->whereDate('activity_log.created_at', '>=', $searchStartDate);
                }
                if(!empty($searchFieldEndDate)) {
                    $searchEndDate = Carbon::createFromFormat('d/m/Y', $searchFieldEndDate)->format('Y-m-d');
                    $query = $query->whereDate('activity_log.created_at', '<=', $searchEndDate);
                }
            }

            return $query->distinct()->select(['activity_log.*', 'users.name as user_name']);
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
