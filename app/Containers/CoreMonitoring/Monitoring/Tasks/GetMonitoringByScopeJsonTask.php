<?php

namespace App\Containers\CoreMonitoring\Monitoring\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Monitoring\Data\Repositories\MonitoringReportRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMonitoringByScopeJsonTask extends ParentTask
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
            ]);
        });

        $result = $result->all();

        $scope = ['Nacional', 'La Paz', 'Oruro', 'Potosí', 'Cochabamba', 'Chuquisaca', 'Tarija', 'Pando', 'Beni', 'Santa Cruz'];

        $data = [];
        foreach ($scope as $department) {
            $data[] = (object) array(
                'state' => $department == 'Nacional' ? 'TSE Nacional' : 'TED ' . $department,
                'total' => $result->where('scope_department', $department)->count()
            );
        }

        return $data;
    }
}
