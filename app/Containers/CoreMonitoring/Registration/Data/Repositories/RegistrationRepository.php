<?php

namespace App\Containers\CoreMonitoring\Registration\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class RegistrationRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
