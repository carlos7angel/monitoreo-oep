<?php

namespace App\Containers\CoreMonitoring\UserProfile\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class PoliticalGroupProfileRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
