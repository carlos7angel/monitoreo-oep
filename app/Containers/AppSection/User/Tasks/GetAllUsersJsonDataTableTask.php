<?php

namespace App\Containers\AppSection\User\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Ship\Criterias\SkipTakeCriteria;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUsersJsonDataTableTask extends ParentTask
{
    public function __construct(
        protected UserRepository $repository,
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
                $query = $query->where('name', 'like', '%'.$searchValue.'%')->orWhere('email', 'like', '%'.$searchValue.'%');
            }

            return $query->distinct()->select(['users.*']);
        });

        $recordsTotal =  (clone $result)->count();

        $result = $result->pushCriteria(new SkipTakeCriteria($skip, $pageSize));

        if($sortColumn != null && $sortColumn != "" && $sortColumnDir != null && $sortColumnDir != "") {
            $result->orderBy($sortColumn, $sortColumnDir);
        }

        $records = $result->all();

        foreach ($records as &$item) {
            $item->rol = $item->roles->first()->display_name;
        }

        $response = [
            'draw' => $draw,
            'recordsFiltered' => $recordsTotal,
            'recordsTotal' => $recordsTotal,
            //'data' => $result->all()
            'data' => $records
        ];

        return $response;
    }
}
