<?php

namespace App\Containers\CoreMonitoring\Accreditation\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class AccreditationRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
