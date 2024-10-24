<?php

namespace App\Containers\CoreMonitoring\Registration\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class PropagandaMaterialRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
