<?php

namespace App\Containers\CoreMonitoring\Accreditation\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Accreditation\Data\Repositories\AccreditationRepository;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetExecutedDataTableTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetInitialDataTableTask;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAdminAccreditationsByElectionJsonDataTableTask extends ParentTask
{
    public function __construct(
        protected AccreditationRepository $accreditationRepository,
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

        $searchFieldStatus = $requestData['columns'][5]['search']['value'];
        $election_id = $request->id;
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $result = $this->accreditationRepository->scopeQuery(
            function ($query) use ($searchValue, $election_id, $searchFieldStatus, $user) {
                $query = $query->join('media_profiles', 'media_accreditations.fid_media_profile', 'media_profiles.id');
                $query = $query->where('fid_election', $election_id);
                if (! empty($searchValue)) {
                    $query = $query->where('media_profiles.name', 'like', '%'.$searchValue.'%')
                                    ->orWhere('media_profiles.business_name', 'like', '%'.$searchValue.'%');
                }

                if (! empty($searchFieldStatus)) {
                    $query = $query->where('media_accreditations.status', $searchFieldStatus);
                } else {
                    $query = $query->whereIn(
                        'media_accreditations.status',
                        ['new', 'observed', 'accredited', 'archived', 'rejected']
                    );
                }

                // if ($user->roles->first()->name === 'media') {
                //     $query = $query->where('media_profiles.coverage', '=', $user->department);
                // }


                return $query->distinct()->select([
                    'media_accreditations.*', 'media_profiles.name as media_name',
                    'media_profiles.business_name as media_business_name',
                    'media_profiles.logo as media_logo', 'media_profiles.media_type_television',
                    'media_profiles.media_type_radio', 'media_profiles.media_type_print',
                    'media_profiles.media_type_digital'
                ]);
            }
        );

        [$recordsTotal, $result] = app(GetExecutedDataTableTask::class)
            ->run($result, $sortColumn, $sortColumnDir, $skip, $pageSize);

        return [
            'draw' => $draw,
            'recordsFiltered' => $recordsTotal,
            'recordsTotal' => $recordsTotal,
            'data' => $result->all()
        ];
    }
}
