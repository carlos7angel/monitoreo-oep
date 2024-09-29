<?php

namespace App\Containers\CoreMonitoring\Catalog\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Catalog\Actions\FindCatalogByIdAction;
use App\Containers\CoreMonitoring\Catalog\Actions\UpdateCatalogAction;
use App\Containers\CoreMonitoring\Catalog\UI\WEB\Requests\EditCatalogRequest;
use App\Containers\CoreMonitoring\Catalog\UI\WEB\Requests\UpdateCatalogRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateCatalogController extends WebController
{
    public function edit(EditCatalogRequest $request)
    {
        $catalog = app(FindCatalogByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateCatalogRequest $request)
    {
        $catalog = app(UpdateCatalogAction::class)->run($request);
        // ...
    }
}
