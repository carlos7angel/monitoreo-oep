<?php

namespace App\Containers\CoreMonitoring\Monitoring\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetExecutedDataTableTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetInitialDataTableTask;
use App\Containers\CoreMonitoring\Monitoring\Data\Repositories\MonitoringItemRepository;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMonitoringByElectionJsonDataTableTask extends ParentTask
{
    public function __construct(
        protected MonitoringItemRepository $monitoringItemRepository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
        [$requestData, $draw, $sortColumn, $sortColumnDir, $pageSize, $skip, $searchValue] =
            app(GetInitialDataTableTask::class)->run($request);

        $searchFieldMediaType = $requestData['columns'][3]['search']['value'];
        $election_id = $request->id;
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $result = $this->monitoringItemRepository->scopeQuery(
            function ($query) use (
                $searchValue,
                $election_id,
                $searchFieldMediaType,
                $user
            ) {

                $query = $query->leftJoin('media_profiles', 'monitoring_items.fid_media_profile', 'media_profiles.id');
                $query = $query->where('fid_election', $election_id);
                if (! empty($searchValue)) {
                    $query = $query->where('media_profiles.name', 'like', '%'.$searchValue.'%')
                                    ->orWhere('media_profiles.business_name', 'like', '%'.$searchValue.'%');
                }

                if (! empty($searchFieldMediaType)) {
                    $query = $query->where('monitoring_items.media_type', $searchFieldMediaType);
                }

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

                return $query->distinct()->select([
                    'monitoring_items.id',
                    'monitoring_items.registered_at',
                    'monitoring_items.registered_by',
                    'monitoring_items.code',
                    'monitoring_items.media_type',
                    'monitoring_items.registered_media',
                    'monitoring_items.other_media',
                    'monitoring_items.fid_election',
                    'monitoring_items.status',
                    'monitoring_items.created_at',
                    DB::raw('CASE 
                WHEN monitoring_items.registered_media = TRUE THEN media_profiles.name 
                WHEN monitoring_items.registered_media = FALSE THEN monitoring_items.other_media 
                ELSE NULL END AS media_name'),
                    'media_profiles.business_name as media_business_name',
                    'media_profiles.logo as media_logo',
                    'media_profiles.media_type_television',
                    'media_profiles.media_type_radio',
                    'media_profiles.media_type_print',
                    'media_profiles.media_type_digital'
                ]);
            }
        );

        [$recordsTotal, $result] = app(GetExecutedDataTableTask::class)
            ->run($result, $sortColumn, $sortColumnDir, $skip, $pageSize);

        $records = $result->all();

        foreach ($records as &$item) {
            $item->can_edit = $item->registered_by === $user->id;
        }

        return [
            'draw' => $draw,
            'recordsFiltered' => $recordsTotal,
            'recordsTotal' => $recordsTotal,
            'data' => $records
        ];
    }
}
