<?php

namespace App\Containers\CoreMonitoring\Accreditation\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Election\Data\Repositories\ElectionRepository;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetExecutedDataTableTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetInitialDataTableTask;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAdminElectionsForAccreditationsJsonDataTableTask extends ParentTask
{
    public function __construct(
        protected ElectionRepository $electionRepository,
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

        $result = $this->electionRepository->scopeQuery(function ($query) use ($searchValue) {
            if (! empty($searchValue)) {
                $query = $query->where('name', 'like', '%'.$searchValue.'%')
                                ->orWhere('code', 'like', '%'.$searchValue.'%');
            }
            $query = $query->whereIn('status', ['active', 'finished'])
                            ->where('enable_for_media_registration', 1);
            return $query->distinct()->select(['elections.*']);
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
