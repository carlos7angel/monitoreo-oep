<?php

namespace App\Containers\CoreMonitoring\Analysis\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Analysis\Actions\FindAnalysisByIdAction;
use App\Containers\CoreMonitoring\Analysis\Actions\UpdateAnalysisAction;
use App\Containers\CoreMonitoring\Analysis\UI\WEB\Requests\EditAnalysisRequest;
use App\Containers\CoreMonitoring\Analysis\UI\WEB\Requests\UpdateAnalysisRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateAnalysisController extends WebController
{
    public function edit(EditAnalysisRequest $request)
    {
        $analysis = app(FindAnalysisByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateAnalysisRequest $request)
    {
        $analysis = app(UpdateAnalysisAction::class)->run($request);
        // ...
    }
}
