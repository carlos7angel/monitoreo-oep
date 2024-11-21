<?php

namespace App\Containers\CoreMonitoring\Accreditation\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Accreditation\Data\Repositories\AccreditationRepository;
use App\Ship\Criterias\SkipTakeCriteria;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAccreditationsJsonDataTableTask extends ParentTask
{
    public function __construct(
        protected AccreditationRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
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

        $result = $this->repository->scopeQuery(function ($query) use ($searchValue, $user) {
            $query = $query->join('elections', 'media_accreditations.fid_election', 'elections.id');
            $query = $query->where('media_accreditations.fid_user', $user->id)->where('media_accreditations.fid_media_profile', $user->profile_data->id);
            if(! empty($searchValue)) {
                $query = $query->where('elections.name', 'like', '%'.$searchValue.'%')
                    ->orWhere('elections.code', 'like', '%'.$searchValue.'%')
                    ->orWhere('media_accreditations.code', 'like', '%'.$searchValue.'%');
            }
            return $query->distinct()->select(['media_accreditations.*',
                // DB::raw('IFNULL(UPPER(SUBSTRING(media_accreditations.code, 1, 6)), NULL) as accreditation_code'),
                'elections.name as election_name', 'elections.code as election_code',
                'elections.logo_image as election_logo_image',
                'elections.start_date_media_registration as election_start_date_media_registration',
                'elections.end_date_media_registration as election_end_date_media_registration']);
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
