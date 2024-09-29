<?php

namespace App\Containers\CoreMonitoring\Catalog\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class CatalogRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
