<?php

namespace App\Containers\CoreMonitoring\Analysis\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Analysis\Actions\ListAnalysesAction;
use App\Containers\CoreMonitoring\Analysis\UI\WEB\Requests\ListAnalysesRequest;
use App\Ship\Parents\Controllers\WebController;

class ListAnalysesController extends WebController
{
    public function index(ListAnalysesRequest $request)
    {
        $analyses = app(ListAnalysesAction::class)->run($request);
        // ...
    }
}
