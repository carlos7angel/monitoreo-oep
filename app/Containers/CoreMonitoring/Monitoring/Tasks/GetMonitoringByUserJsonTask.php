<?php

namespace App\Containers\CoreMonitoring\Monitoring\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\User\Tasks\GetUsersByRolesScopeTask;
use App\Containers\CoreMonitoring\Monitoring\Data\Repositories\MonitoringReportRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMonitoringByUserJsonTask extends ParentTask
{
    public function __construct(
        protected MonitoringReportRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($election_id): mixed
    {
        $result = $this->repository->scopeQuery(function ($query) use ($election_id) {

            $query = $query->join('elections', 'monitoring_reports.fid_election', 'elections.id');
            $query = $query->join('monitoring_items', 'monitoring_reports.fid_monitoring_item', 'monitoring_items.id');

            $query = $query->where('monitoring_reports.fid_election', '=', $election_id);
            $query = $query->whereIn('monitoring_reports.status', ['NEW', 'SUBMITTED', 'IN_PROGRESS', 'REJECTED', 'FINISHED', 'ARCHIVED']);

            return $query->distinct()->select([
                'monitoring_reports.*',
                'monitoring_items.media_type',
                'monitoring_items.registered_by',
            ]);
        });

        $result = $result->all();

        $users = app(GetUsersByRolesScopeTask::class)->run(['monitor']);

        foreach ($users as $user) {
            $user->total_rows = $result->where('registered_by', $user->id)->count();
        }

        return $users;
    }
}
