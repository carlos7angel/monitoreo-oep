<?php

namespace App\Containers\CoreMonitoring\Election\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Election\Data\Repositories\ElectionRepository;
use App\Ship\Criterias\SkipTakeCriteria;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllElectionsJsonDataTableTask extends ParentTask
{
    public function __construct(
        protected ElectionRepository $repository,
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

        $searchFieldName = $requestData['columns'][2]['search']['value'];
        $searchFieldType = $requestData['columns'][3]['search']['value'];
        $searchFieldCode = $requestData['columns'][1]['search']['value'];
        $searchFieldStatus = $requestData['columns'][5]['search']['value'];
        $searchFieldDate = $requestData['columns'][4]['search']['value'];

        $result = $this->repository->scopeQuery(function ($query) use ($searchValue, $searchFieldName, $searchFieldType, $searchFieldCode, $searchFieldStatus, $searchFieldDate) {

            if (! empty($searchFieldName)) {
                $query = $query->where('name', 'like', '%'.$searchFieldName.'%');
            }

            if (! empty($searchFieldType)) {
                $query = $query->where('type', '=', $searchFieldType);
            }

            if (! empty($searchFieldCode)) {
                $query = $query->where('name', 'like', '%'.$searchFieldName.'%');
            }

            if (! empty($searchFieldStatus)) {
                $query = $query->where('status', '=', $searchFieldStatus);
            }

            if (! empty($searchFieldDate)) {
                $searchDate = Carbon::createFromFormat('d/m/Y', $searchFieldDate)->format('Y-m-d');
                $query = $query->whereDate('election_date', '=', $searchDate);
            }

            if (! empty($searchValue)) {
                $query = $query->where('name', 'like', '%'.$searchValue.'%')
                                ->orWhere('code', 'like', '%'.$searchValue.'%');
            }

            $query = $query->whereIn('status', ['draft', 'active', 'unpublished', 'finished', 'archived', 'canceled']);
            return $query->distinct()->select(['elections.*']);
        });

        $recordsTotal =  (clone $result)->count();

        $result = $result->pushCriteria(new SkipTakeCriteria($skip, $pageSize));

        if ($sortColumn != null && $sortColumn != "" && $sortColumnDir != null && $sortColumnDir != "") {
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
