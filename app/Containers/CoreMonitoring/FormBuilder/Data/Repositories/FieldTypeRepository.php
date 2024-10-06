<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class FieldTypeRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
    ];
}
