<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class FieldRepository extends ParentRepository
{
    protected $container = "FormBuilder";

    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
