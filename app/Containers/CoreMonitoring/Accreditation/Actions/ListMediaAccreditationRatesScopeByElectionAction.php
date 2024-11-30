<?php

namespace App\Containers\CoreMonitoring\Accreditation\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Accreditation\Tasks\ListAccreditationRatesByElectionTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListMediaAccreditationRatesScopeByElectionAction extends ParentAction
{
    public function __construct(
        private ListAccreditationRatesByElectionTask $listAccreditationRatesByElectionTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($id): mixed
    {
        $scope = [
            'Nacional',
            'Chuquisaca',
            'La Paz',
            'Cochabamba',
            'Oruro',
            'Potosí',
            'Tarija',
            'Santa Cruz',
            'Beni',
            'Pando',
        ];

        $types = [
            'Televisivo',
            'Radial',
            'Impreso',
            'Digital',
        ];

        $rates = $this->listAccreditationRatesByElectionTask->run($id);

        $data = [];
        foreach ($scope as $department) {
            $ratesScope = $rates->where('scope', $department);
            foreach ($types as $media_type) {
                $rates_media = $ratesScope->where('type', $media_type);
                if ($rates_media->count() > 0) {
                    $data[$department][$media_type] = $rates_media->all();
                }
            }
        }

        return $data;
    }
}
