<?php

namespace App\Containers\CoreMonitoring\Monitoring\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Analysis\Data\Repositories\AnalysisReportRepository;
use App\Containers\CoreMonitoring\Monitoring\Data\Repositories\MonitoringReportRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMonitoringByMediaTypeJsonTask extends ParentTask
{
    public function __construct(
        protected MonitoringReportRepository $repository,
        protected AnalysisReportRepository $analysisRepository,
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
            $query = $query->whereIn('monitoring_reports.status', [
                'NEW',
                'SUBMITTED',
                'IN_PROGRESS',
                'REJECTED',
                'FINISHED',
                'ARCHIVED'
            ]);

            return $query->distinct()->select([
                'monitoring_reports.*',
                'monitoring_items.media_type'
            ]);
        });

        $result = $result->all();

        $response = [
            'tv' => $result->where('media_type', 'TV')->count(),
            'radio' => $result->where('media_type', 'RADIO')->count(),
            'print' => $result->where('media_type', 'PRINT')->count(),
            'digital' => $result->where('media_type', 'DIGITAL')->count(),
            'rrss' => $result->where('media_type', 'RRSS')->count(),
        ];

        return $response;
    }
}
