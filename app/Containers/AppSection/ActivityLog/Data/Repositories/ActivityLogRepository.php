<?php

namespace App\Containers\AppSection\ActivityLog\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ActivityLogRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
