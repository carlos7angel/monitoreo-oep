<?php

namespace App\Containers\CoreMonitoring\UserProfile\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetExecutedDataTableTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetInitialDataTableTask;
use App\Containers\CoreMonitoring\UserProfile\Data\Repositories\MediaProfileRepository;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetNewUserMediaProfilesJsonDataTableTask extends ParentTask
{
    public function __construct(
        protected MediaProfileRepository $mediaProfileRepository,
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

        $result = $this->mediaProfileRepository->scopeQuery(function ($query) use ($searchValue) {
            if (! empty($searchValue)) {
                $query = $query
                            ->where('name', 'like', '%'.$searchValue.'%')
                            ->orWhere('business_name', 'like', '%'.$searchValue.'%')
                            ->orWhere('email', 'like', '%'.$searchValue.'%');
            }

            $query->where(['status' => 'created']);

            return $query->distinct()->select(['media_profiles.*']);
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
