<?php

namespace App\Containers\CoreMonitoring\Catalog\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Catalog\Actions\FindCatalogByIdAction;
use App\Containers\CoreMonitoring\Catalog\UI\WEB\Requests\FindCatalogByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindCatalogByIdController extends WebController
{
    public function show(FindCatalogByIdRequest $request)
    {
        $catalog = app(FindCatalogByIdAction::class)->run($request);
        // ...
    }
}
