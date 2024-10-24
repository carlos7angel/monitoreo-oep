<?php

namespace App\Containers\CoreMonitoring\Analysis\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Analysis\Actions\FindAnalysisByIdAction;
use App\Containers\CoreMonitoring\Analysis\UI\WEB\Requests\FindAnalysisByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindAnalysisByIdController extends WebController
{
    public function show(FindAnalysisByIdRequest $request)
    {
        $analysis = app(FindAnalysisByIdAction::class)->run($request);
        // ...
    }
}
