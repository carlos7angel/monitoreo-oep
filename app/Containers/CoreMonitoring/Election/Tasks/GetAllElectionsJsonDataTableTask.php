<?php

namespace App\Containers\CoreMonitoring\Election\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Election\Data\Repositories\ElectionRepository;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetExecutedDataTableTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetInitialDataTableTask;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllElectionsJsonDataTableTask extends ParentTask
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

        $searchFieldCode = $requestData['columns'][1]['search']['value'];
        $searchFieldName = $requestData['columns'][2]['search']['value'];
        $searchFieldType = $requestData['columns'][3]['search']['value'];
        $searchFieldDate = $requestData['columns'][4]['search']['value'];
        $searchFieldStatus = $requestData['columns'][5]['search']['value'];

        $result = $this->electionRepository->scopeQuery(function ($query) use (
            $searchValue, $searchFieldName, $searchFieldType, $searchFieldCode, $searchFieldStatus, $searchFieldDate
        ) {

            if (! empty($searchFieldName)) {
                $query = $query->where('name', 'like', '%'.$searchFieldName.'%');
            }

            if (! empty($searchFieldType)) {
                $query = $query->where('type', '=', $searchFieldType);
            }

            if (! empty($searchFieldCode)) {
                $query = $query->where('name', 'like', '%'.$searchFieldName.'%');
            }

            if (! empty($searchFieldStatus)) {
                $query = $query->where('status', '=', $searchFieldStatus);
            }

            if (! empty($searchFieldDate)) {
                $searchDate = Carbon::createFromFormat('d/m/Y', $searchFieldDate)->format('Y-m-d');
                $query = $query->whereDate('election_date', '=', $searchDate);
            }

            if (! empty($searchValue)) {
                $query = $query->where('name', 'like', '%'.$searchValue.'%')
                                ->orWhere('code', 'like', '%'.$searchValue.'%');
            }

            $query = $query->whereIn('status', ['draft', 'active', 'unpublished', 'finished', 'archived', 'canceled']);
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
