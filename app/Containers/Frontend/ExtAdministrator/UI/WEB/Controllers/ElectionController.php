<?php

namespace App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Election\Tasks\GetActiveElectionsTask;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\Election\ShowPartialActiveElectionsRequest;
use App\Ship\Parents\Controllers\WebController;
use Exception;

class ElectionController extends WebController
{
    public function listActiveElections(ShowPartialActiveElectionsRequest $request)
    {
        try {
            $elections = app(GetActiveElectionsTask::class)->run();
            $render = view('frontend@extAdministrator::election.partials.listElections')->with([
                'elections' => $elections,
            ])->render();
            return response()->json(['success' => true, 'render' => $render]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'render' => null, 'message' => $e->getMessage()]);
        }
    }
}
