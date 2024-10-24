<?php

namespace App\Containers\CoreMonitoring\Registration\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Registration\Data\Repositories\RegistrationRepository;
use App\Ship\Criterias\SkipTakeCriteria;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetRegistrationElectionsJsonDTTask extends ParentTask
{
    public function __construct(
        protected RegistrationRepository $repository,
    ) {
    }

    public function run(Request $request): mixed
    {
        // dd($request->all());
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('external');

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

        $political_group_profile_id = $user->profile_data->id;


        $result = $this->repository->scopeQuery(function ($query) use ($searchValue, $political_group_profile_id, $user) {

            $query = $query->join('elections', 'political_registrations.fid_election', 'elections.id');
            $query = $query->where('fid_political_group_profile', $political_group_profile_id);

            if(! empty($searchValue)) {
                $query = $query->where('elections.name', 'like', '%'.$searchValue.'%')
                    ->orWhere('elections.code', 'like', '%'.$searchValue.'%');
            }

            return $query->distinct()->select(['elections.*', 'political_registrations.id as registration_id']);
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
