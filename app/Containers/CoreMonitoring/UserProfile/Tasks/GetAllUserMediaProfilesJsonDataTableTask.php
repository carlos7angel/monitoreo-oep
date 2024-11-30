<?php

namespace App\Containers\CoreMonitoring\UserProfile\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetExecutedDataTableTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetInitialDataTableTask;
use App\Containers\CoreMonitoring\UserProfile\Data\Repositories\MediaProfileRepository;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUserMediaProfilesJsonDataTableTask extends ParentTask
{
    public function __construct(
        protected MediaProfileRepository $repository,
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

        $searchFieldEmail = $requestData['columns'][2]['search']['value'];
        $searchFieldName = $requestData['columns'][1]['search']['value'];
        $searchFieldStatus = $requestData['columns'][5]['search']['value'];
        $searchFieldDate = $requestData['columns'][4]['search']['value'];
        $searchFieldScope = $requestData['columns'][6]['search']['value'];
        $searchFieldType = $requestData['columns'][3]['search']['value'];

        $result = $this->repository->scopeQuery(function ($query) use (
            $searchValue,
            $searchFieldName,
            $searchFieldEmail,
            $searchFieldDate,
            $searchFieldType,
            $searchFieldScope,
            $searchFieldStatus
        ) {
            if (! empty($searchValue)) {
                $query = $query
                            ->where('name', 'like', '%'.$searchValue.'%')
                            ->orWhere('business_name', 'like', '%'.$searchValue.'%')
                            ->orWhere('email', 'like', '%'.$searchValue.'%');
            }

            if (! empty($searchFieldName)) {
                $query = $query->where('name', 'like', '%'.$searchFieldName.'%');
            }

            if (! empty($searchFieldEmail)) {
                $query = $query->where('email', 'like', '%'.$searchFieldEmail.'%');
            }

            if (! empty($searchFieldDate)) {
                $searchDate = Carbon::createFromFormat('d/m/Y', $searchFieldDate)->format('Y-m-d');
                $query = $query->whereDate('election_date', '=', $searchDate);
            }

            if (! empty($searchFieldType)) {
                $query = $query->where('type', 'like', '%'.$searchFieldType.'%');
            }

            if (! empty($searchFieldScope)) {
                $query = $query->where('scope_department', 'like', '%'.$searchFieldScope.'%')
                                ->orWhere('scope_municipality', 'like', '%'.$searchFieldScope.'%');
            }

            if (! empty($searchFieldStatus)) {
                $query = $query->where('status', '=', $searchFieldStatus);
            } else {
                $query = $query->where('status', '<>', 'created');
            }

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
