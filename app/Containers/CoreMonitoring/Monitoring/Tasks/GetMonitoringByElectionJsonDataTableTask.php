<?php

namespace App\Containers\CoreMonitoring\Monitoring\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Monitoring\Data\Repositories\MonitoringItemRepository;
use App\Ship\Criterias\SkipTakeCriteria;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMonitoringByElectionJsonDataTableTask extends ParentTask
{
    public function __construct(
        protected MonitoringItemRepository $repository,
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

        $searchFieldMediaType = $requestData['columns'][3]['search']['value'];

        $election_id = $request->id;

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $result = $this->repository->scopeQuery(function ($query) use ($searchValue, $election_id, $searchFieldMediaType, $user) {

            $query = $query->leftJoin('media_profiles', 'monitoring_items.fid_media_profile', 'media_profiles.id');
            $query = $query->where('fid_election', $election_id);
            if(! empty($searchValue)) {
                $query = $query->where('media_profiles.name', 'like', '%'.$searchValue.'%')
                                ->orWhere('media_profiles.business_name', 'like', '%'.$searchValue.'%');
            }

            if(! empty($searchFieldMediaType)) {
                $query = $query->where('monitoring_items.media_type', $searchFieldMediaType);
            }

            // if ($user->roles->first()->name === 'media') {
            //     $query = $query->where('media_profiles.coverage', '=', $user->department);
            // }

            if ($user && false) { // Allow all records
                if ($user->type === 'TSE' || empty($user->type)) {
                    $query = $query->where('monitoring_items.scope_type', '=', 'TSE')
                                    ->where('monitoring_items.scope_department', '=', 'Nacional');
                }
                if ($user->type === 'TED') {
                    $query = $query->where('monitoring_items.scope_type', '=', 'TED')
                                    ->where('monitoring_items.scope_department', '=', $user->department);
                }
            }

            // $query = $query->whereIn('status', ['active', 'finished']);
            return $query->distinct()->select([
                'monitoring_items.*',
                DB::raw('CASE WHEN monitoring_items.registered_media = TRUE THEN media_profiles.name WHEN monitoring_items.registered_media = FALSE THEN monitoring_items.other_media ELSE NULL END AS media_name'),
                // 'media_profiles.name as media_name',
                'media_profiles.business_name as media_business_name',
                'media_profiles.logo as media_logo',
                'media_profiles.media_type_television',
                'media_profiles.media_type_radio',
                'media_profiles.media_type_print',
                'media_profiles.media_type_digital'
            ]);
        });

        $recordsTotal =  (clone $result)->count();

        $result = $result->pushCriteria(new SkipTakeCriteria($skip, $pageSize));

        if($sortColumn != null && $sortColumn != "" && $sortColumnDir != null && $sortColumnDir != "") {
            $result->orderBy($sortColumn, $sortColumnDir);
        }

        $records = $result->all();

        foreach ($records as &$item) {
            $item->can_edit = $item->registered_by === $user->id;
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
