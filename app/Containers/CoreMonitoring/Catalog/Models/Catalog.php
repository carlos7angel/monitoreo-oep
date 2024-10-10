<?php

namespace App\Containers\CoreMonitoring\Catalog\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Catalog extends ParentModel
{
    protected $table = 'catalogs';

    protected $fillable = [
        'code',
        'name',
        'description',
        'status',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected string $resourceKey = 'catalogs';

    public function items()
    {
        return $this->hasMany(CatalogItem::class, 'fid_catalog');
    }
}
