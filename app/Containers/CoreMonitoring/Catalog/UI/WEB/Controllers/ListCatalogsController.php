<?php

namespace App\Containers\CoreMonitoring\Catalog\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Catalog\Actions\ListCatalogsAction;
use App\Containers\CoreMonitoring\Catalog\UI\WEB\Requests\ListCatalogsRequest;
use App\Ship\Parents\Controllers\WebController;

class ListCatalogsController extends WebController
{
    public function index(ListCatalogsRequest $request)
    {
        $catalogs = app(ListCatalogsAction::class)->run($request);
        // ...
    }
}
