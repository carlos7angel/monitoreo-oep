<?php

namespace App\Containers\CoreMonitoring\Catalog\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class CatalogItem extends ParentModel
{
    protected $table = 'catalog_items';

    protected string $resourceKey = 'CatalogItem';
}
