<?php

namespace App\Containers\CoreMonitoring\Registration\Tasks;

use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetExecutedDataTableTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetInitialDataTableTask;
use App\Containers\CoreMonitoring\Registration\Data\Repositories\RegistrationRepository;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetRegistrationElectionsJsonDTTask extends ParentTask
{
    public function __construct(
        protected RegistrationRepository $repository,
    ) {
    }

    public function run(Request $request): mixed
    {
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('external');

        [$requestData, $draw, $sortColumn, $sortColumnDir, $pageSize, $skip, $searchValue] =
            app(GetInitialDataTableTask::class)->run($request);

        $political_group_profile_id = $user->profile_data->id;

        $result = $this->repository->scopeQuery(function ($query)
        use ($searchValue, $political_group_profile_id, $user) {

            $query = $query->join('elections', 'political_registrations.fid_election', 'elections.id');
            $query = $query->where('fid_political_group_profile', $political_group_profile_id);

            if (! empty($searchValue)) {
                $query = $query->where('elections.name', 'like', '%'.$searchValue.'%')
                    ->orWhere('elections.code', 'like', '%'.$searchValue.'%');
            }

            return $query->distinct()->select(['elections.*', 'political_registrations.id as registration_id']);
        });

        [$recordsTotal, $result] = app(GetExecutedDataTableTask::class)
            ->run($result, $sortColumn, $sortColumnDir, $skip, $pageSize);

        $records = $result->all();

        foreach ($records as &$item) {
            $item->material_count = $item->materials->count();
        }

        return [
            'draw' => $draw,
            'recordsFiltered' => $recordsTotal,
            'recordsTotal' => $recordsTotal,
            'data' => $records
        ];
    }
}
