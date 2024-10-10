<?php

namespace App\Containers\CoreMonitoring\Monitoring\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class MonitoringRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
