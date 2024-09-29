<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class FormRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
        'form_type' => '=',
        'updated_at' => 'like',
    ];
}
