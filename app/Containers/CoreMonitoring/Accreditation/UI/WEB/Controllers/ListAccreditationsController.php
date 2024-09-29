<?php

namespace App\Containers\CoreMonitoring\Accreditation\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Accreditation\Actions\ListAccreditationsAction;
use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Requests\ListAccreditationsRequest;
use App\Ship\Parents\Controllers\WebController;

class ListAccreditationsController extends WebController
{
    public function index(ListAccreditationsRequest $request)
    {
        $accreditations = app(ListAccreditationsAction::class)->run($request);
        // ...
    }
}
