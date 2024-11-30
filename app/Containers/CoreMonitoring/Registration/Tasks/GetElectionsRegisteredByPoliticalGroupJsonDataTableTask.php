<?php

namespace App\Containers\CoreMonitoring\Registration\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Registration\Data\Repositories\RegistrationRepository;
use App\Ship\Criterias\SkipTakeCriteria;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetElectionsRegisteredByPoliticalGroupJsonDataTableTask extends ParentTask
{
    public function __construct(
        protected RegistrationRepository $repository,
    ) {
    }

    public function run(Request $request): mixed
    {
        $requestData = $request->all();
        $draw = $requestData['draw'];
        $start = $requestData['start'];
        $length = $requestData['length'];
        $sortColumn = $sortColumnDir = null;
        if (isset($requestData['order'])) {
            $indexSort = $requestData['order'][0]['column'];
            $sortColumn = $requestData['columns'][$indexSort]['name'];
            $sortColumnDir = $requestData['order'][0]['dir'];
        }
        $searchValue = $requestData['search']['value'];
        $pageSize = $length != null ? intval($length) : 0;
        $skip = $start != null ? intval($start) : 0;

        $political_group_profile_id = $request->id;

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $result = $this->repository->scopeQuery(function ($query) use ($searchValue, $political_group_profile_id, $user) {

            $query = $query->leftJoin('elections', 'political_registrations.fid_election', 'elections.id');
            $query = $query->where('fid_political_group_profile', $political_group_profile_id);

            return $query->distinct()->select([
                'elections.*',
                'political_registrations.id as registration_id',
                'political_registrations.fid_political_group_profile as political_group_profile_id'
            ]);
        });

        $recordsTotal =  (clone $result)->count();

        $result = $result->pushCriteria(new SkipTakeCriteria($skip, $pageSize));

        if ($sortColumn != null && $sortColumn != "" && $sortColumnDir != null && $sortColumnDir != "") {
            $result->orderBy($sortColumn, $sortColumnDir);
        }

        $records = $result->all();

        foreach ($records as &$item) {
            $item->material_count = $item->materials->count();
        }

        $response = [
            'draw' => $draw,
            'recordsFiltered' => $recordsTotal,
            'recordsTotal' => $recordsTotal,
            'data' => $records
        ];

        return $response;
    }
}
