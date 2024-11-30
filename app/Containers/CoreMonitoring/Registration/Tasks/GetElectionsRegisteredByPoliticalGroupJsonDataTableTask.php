<?php

namespace App\Containers\CoreMonitoring\Registration\Tasks;

use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetExecutedDataTableTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetInitialDataTableTask;
use App\Containers\CoreMonitoring\Registration\Data\Repositories\RegistrationRepository;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetElectionsRegisteredByPoliticalGroupJsonDataTableTask extends ParentTask
{
    public function __construct(
        protected RegistrationRepository $registrationRepository,
    ) {
    }

    public function run(Request $request): mixed
    {
        [$requestData, $draw, $sortColumn, $sortColumnDir, $pageSize, $skip, $searchValue] =
            app(GetInitialDataTableTask::class)->run($request);

        $political_group_profile_id = $request->id;

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $result = $this->registrationRepository->scopeQuery(function ($query) use ($searchValue, $political_group_profile_id, $user) {

            $query = $query->leftJoin('elections', 'political_registrations.fid_election', 'elections.id');
            $query = $query->where('fid_political_group_profile', $political_group_profile_id);

            return $query->distinct()->select([
                'elections.*',
                'political_registrations.id as registration_id',
                'political_registrations.fid_political_group_profile as political_group_profile_id'
            ]);
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
