<?php

namespace App\Containers\CoreMonitoring\Analysis\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Analysis\Actions\DeleteAnalysisAction;
use App\Containers\CoreMonitoring\Analysis\UI\WEB\Requests\DeleteAnalysisRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteAnalysisController extends WebController
{
    public function destroy(DeleteAnalysisRequest $request)
    {
        $result = app(DeleteAnalysisAction::class)->run($request);
        // ...
    }
}
