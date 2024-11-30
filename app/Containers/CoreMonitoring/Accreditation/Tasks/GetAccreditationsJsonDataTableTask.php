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

        [$requestData, $draw, $sortColumn, $sortColumnDir, $pageSize, $skip, $searchValue] =
            app(GetInitialDataTableTask::class)->run($request);

        $result = $this->repository->scopeQuery(function ($query) use ($searchValue, $user) {
            $query = $query->join('elections', 'media_accreditations.fid_election', 'elections.id');
            $query = $query->where('media_accreditations.fid_user', $user->id)
                            ->where('media_accreditations.fid_media_profile', $user->profile_data->id);
            if (! empty($searchValue)) {
                $query = $query->where('elections.name', 'like', '%'.$searchValue.'%')
                    ->orWhere('elections.code', 'like', '%'.$searchValue.'%')
                    ->orWhere('media_accreditations.code', 'like', '%'.$searchValue.'%');
            }
            return $query->distinct()->select(['media_accreditations.*',
                'elections.name as election_name', 'elections.code as election_code',
                'elections.logo_image as election_logo_image',
                'elections.start_date_media_registration as election_start_date_media_registration',
                'elections.end_date_media_registration as election_end_date_media_registration']);
        });

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
