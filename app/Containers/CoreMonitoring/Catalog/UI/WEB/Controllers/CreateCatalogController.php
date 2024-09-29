<?php

namespace App\Containers\CoreMonitoring\Catalog\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Catalog\Actions\CreateCatalogAction;
use App\Containers\CoreMonitoring\Catalog\UI\WEB\Requests\CreateCatalogRequest;
use App\Containers\CoreMonitoring\Catalog\UI\WEB\Requests\StoreCatalogRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateCatalogController extends WebController
{
    public function create(CreateCatalogRequest $request)
    {
    }

    public function store(StoreCatalogRequest $request)
    {
        $catalog = app(CreateCatalogAction::class)->run($request);
        // ...
    }
}
