<?php

namespace App\Containers\CoreMonitoring\Election\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ElectionRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
