<?php

namespace App\Containers\CoreMonitoring\Analysis\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Analysis\Actions\CreateAnalysisReportAction;
use App\Containers\CoreMonitoring\Analysis\UI\WEB\Requests\CreateAnalysisRequest;
use App\Containers\CoreMonitoring\Analysis\UI\WEB\Requests\StoreAnalysisRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateAnalysisController extends WebController
{
    public function create(CreateAnalysisRequest $request)
    {
    }

    public function store(StoreAnalysisRequest $request)
    {
        $analysis = app(CreateAnalysisReportAction::class)->run($request);
        // ...
    }
}
