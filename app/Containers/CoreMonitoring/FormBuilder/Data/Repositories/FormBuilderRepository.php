<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class FormBuilderRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
