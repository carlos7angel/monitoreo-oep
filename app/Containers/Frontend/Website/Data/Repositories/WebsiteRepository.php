<?php

namespace App\Containers\Frontend\Website\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class WebsiteRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
