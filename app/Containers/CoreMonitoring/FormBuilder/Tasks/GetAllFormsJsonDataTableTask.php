<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\FormBuilder\Data\Repositories\FormRepository;
use App\Ship\Criterias\SkipTakeCriteria;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllFormsJsonDataTableTask extends ParentTask
{
    public function __construct(
        protected FormRepository $repository,
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

        $result = $this->repository->scopeQuery(function ($query) use ($searchValue) {
            if(! empty($searchValue)) {
                $query = $query->where('name', 'like', '%'.$searchValue.'%')->orWhere('unique_code', 'like', '%'.$searchValue.'%');
            }
            return $query->distinct()->select(['forms.*']);
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
