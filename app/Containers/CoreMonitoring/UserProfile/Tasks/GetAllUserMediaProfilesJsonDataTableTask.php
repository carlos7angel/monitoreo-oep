<?php

namespace App\Containers\CoreMonitoring\UserProfile\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\UserProfile\Data\Repositories\MediaProfileRepository;
use App\Ship\Criterias\SkipTakeCriteria;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUserMediaProfilesJsonDataTableTask extends ParentTask
{
    public function __construct(
        protected MediaProfileRepository $repository,
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
        $indexSort = $requestData['order'][0]['column'];
        $sortColumn = $requestData['columns'][$indexSort]['name'];
        $sortColumnDir = $requestData['order'][0]['dir'];
        $searchValue = $requestData['search']['value'];
        $pageSize = $length != null ? intval($length) : 0;
        $skip = $start != null ? intval($start) : 0;

        $searchFieldName = $requestData['columns'][1]['search']['value'];
        $searchFieldEmail = $requestData['columns'][2]['search']['value'];
        $searchFieldDate = $requestData['columns'][4]['search']['value'];
        $searchFieldType = $requestData['columns'][3]['search']['value'];
        $searchFieldScope = $requestData['columns'][6]['search']['value'];
        $searchFieldStatus = $requestData['columns'][5]['search']['value'];

        $result = $this->repository->scopeQuery(function ($query) use (
            $searchValue, $searchFieldName, $searchFieldEmail, $searchFieldDate, $searchFieldType, $searchFieldScope, $searchFieldStatus
        ) {
            if(! empty($searchValue)) {
                $query = $query
                            ->where('name', 'like', '%'.$searchValue.'%')
                            ->orWhere('business_name', 'like', '%'.$searchValue.'%')
                            ->orWhere('email', 'like', '%'.$searchValue.'%');
            }

            if(! empty($searchFieldName)) {
                $query = $query->where('name', 'like', '%'.$searchFieldName.'%');
            }

            if(! empty($searchFieldEmail)) {
                $query = $query->where('email', 'like', '%'.$searchFieldEmail.'%');
            }

            if(! empty($searchFieldDate)) {
                $searchDate = Carbon::createFromFormat('d/m/Y', $searchFieldDate)->format('Y-m-d');
                $query = $query->whereDate('election_date', '=', $searchDate);
            }

            if(! empty($searchFieldType)) {
                $query = $query->where('type', 'like', '%'.$searchFieldType.'%');
            }

            if(! empty($searchFieldScope)) {
                $query = $query->where('scope_department', 'like', '%'.$searchFieldScope.'%')
                                ->orWhere('scope_municipality', 'like', '%'.$searchFieldScope.'%');
            }

            if(! empty($searchFieldStatus)) {
                $query = $query->where('status', '=', $searchFieldStatus);
                // $query->where(['status' => '$searchFieldStatus']);
            }
             else {
                 // $query = $query->whereIn('status', ['created', 'active', 'archived']);
                 $query = $query->where('status', '<>', 'created');
             }

            return $query->distinct()->select(['media_profiles.*']);
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
