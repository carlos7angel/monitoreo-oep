<?php

namespace App\Containers\CoreMonitoring\Catalog\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Catalog extends ParentModel
{
    protected $table = 'catalogs';

    protected string $resourceKey = 'Catalog';
}
