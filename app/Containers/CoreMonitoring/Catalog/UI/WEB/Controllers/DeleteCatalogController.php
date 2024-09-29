<?php

namespace App\Containers\CoreMonitoring\Catalog\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Catalog\Actions\DeleteCatalogAction;
use App\Containers\CoreMonitoring\Catalog\UI\WEB\Requests\DeleteCatalogRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteCatalogController extends WebController
{
    public function destroy(DeleteCatalogRequest $request)
    {
        $result = app(DeleteCatalogAction::class)->run($request);
        // ...
    }
}
