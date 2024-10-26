<?php

namespace App\Containers\CoreMonitoring\Analysis\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class AnalysisReportStatusActivity extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
