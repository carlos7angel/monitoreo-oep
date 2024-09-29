<?php

namespace App\Containers\CoreMonitoring\FileManager\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class FileRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
