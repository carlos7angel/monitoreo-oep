<?php

namespace App\Containers\AppSection\ActivityLog\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ActivityLog\Data\Repositories\ActivityLogRepository;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetExecutedDataTableTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetInitialDataTableTask;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllActivityLogsJsonDTTask extends ParentTask
{
    public function __construct(
        protected ActivityLogRepository $activityLogRepository,
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

        $searchFieldDesc = $requestData['columns'][2]['search']['value'];
        $searchFieldType = $requestData['columns'][1]['search']['value'];
        $searchFieldEndDate = $requestData['columns'][5]['search']['value'];
        $searchFieldStartDate = $requestData['columns'][4]['search']['value'];

        $result = $this->activityLogRepository->scopeQuery(function ($query) use (
            $searchFieldType,
            $searchFieldDesc,
            $searchFieldStartDate,
            $searchFieldEndDate
        ) {

            $query = $query->join('users', 'activity_log.causer_id', 'users.id');

            if (! empty($searchFieldType)) {
                $query = $query->where('activity_log.log_name', '=', $searchFieldType);
            }

            if (! empty($searchFieldDesc)) {
                $query = $query->where('activity_log.description', 'like', '%'.$searchFieldDesc.'%');
            }

            if (!empty($searchFieldStartDate) && !empty($searchFieldEndDate)) {
                $searchStartDate = Carbon::createFromFormat('d/m/Y', $searchFieldStartDate)
                    ->format('Y-m-d');
                $searchEndDate = Carbon::createFromFormat('d/m/Y', $searchFieldEndDate)
                    ->format('Y-m-d');
                $query = $query->whereDate('activity_log.created_at', '>=', $searchStartDate)
                                ->whereDate('activity_log.created_at', '<=', $searchEndDate);
            } else {
                if (!empty($searchFieldStartDate)) {
                    $searchStartDate = Carbon::createFromFormat('d/m/Y', $searchFieldStartDate)
                        ->format('Y-m-d');
                    $query = $query->whereDate('activity_log.created_at', '>=', $searchStartDate);
                }
                if (!empty($searchFieldEndDate)) {
                    $searchEndDate = Carbon::createFromFormat('d/m/Y', $searchFieldEndDate)
                        ->format('Y-m-d');
                    $query = $query->whereDate('activity_log.created_at', '<=', $searchEndDate);
                }
            }

            return $query->distinct()->select([
                'activity_log.id',
                'activity_log.log_name',
                'activity_log.description',
                'activity_log.subject_type',
                'activity_log.event',
                'activity_log.subject_id',
                'activity_log.causer_type',
                'activity_log.causer_id',
                'activity_log.ip_address',
                'activity_log.user_agent',
                'activity_log.created_at',
                'activity_log.updated_at',
                'users.name as user_name'
            ]);
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
