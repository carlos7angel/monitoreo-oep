<?php

namespace App\Containers\CoreMonitoring\Analysis\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Analysis\Data\Repositories\AnalysisReportRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAnalysisByStatusJsonTask extends ParentTask
{
    public function __construct(
        protected AnalysisReportRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($election_id): mixed
    {
        $result = $this->repository->scopeQuery(function ($query) use ($election_id) {
            $query = $query->where('analysis_reports.fid_election', '=', $election_id);
            // $query = $query->whereIn('monitoring_reports.status', ['NEW', 'SUBMITTED', 'IN_PROGRESS', 'REJECTED', 'FINISHED', 'ARCHIVED']);
            return $query->distinct()->select([
                'analysis_reports.*',
            ]);
        });

        $result = $result->all();

        $statuses = [
            'NEW',
            'REJECTED',
            'UNTREATED',
            'IN_TREATMENT',
            'COMPLEMENTARY_REPORT',
            //'FIRST_INSTANCE_RESOLUTION',
            'UNTREATED_PLENARY',
            'IN_TREATMENT_PLENARY',
            'COMPLEMENTARY_REPORT_PLENARY',
            //'FINAL_RESOLUTION',
            'FINALIZED',
            'ARCHIVED'
        ];

        $map_status_label = [
            'Nuevo',
            'Rechazado',
            'No tratado',
            'En tratamiento',
            'Informe complementario',
            //'FIRST_INSTANCE_RESOLUTION',
            'No tratado (Sala Plena)',
            'En tratamiento (Sala Plena)',
            'Inform complementario (Sala Plena)',
            //'FINAL_RESOLUTION',
            'Resolución final',
            'Archivado'
        ];

        $data = [];
        foreach ($statuses as $key => $status) {
            $data[] = (object) array(
                'status' => $map_status_label[$key],
                'total' => $result->where('status', $status)->count()
            );
        }

        return $data;
    }
}
