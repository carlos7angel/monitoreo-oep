<?php

namespace App\Containers\CoreMonitoring\Registration\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Registration\Actions\ListRegistrationsAction;
use App\Containers\CoreMonitoring\Registration\UI\WEB\Requests\ListRegistrationsRequest;
use App\Ship\Parents\Controllers\WebController;

class ListRegistrationsController extends WebController
{
    public function index(ListRegistrationsRequest $request)
    {
        $registrations = app(ListRegistrationsAction::class)->run($request);
        // ...
    }
}
