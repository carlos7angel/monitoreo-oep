<?php

namespace App\Containers\CoreMonitoring\Registration\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Registration\Actions\FindRegistrationByIdAction;
use App\Containers\CoreMonitoring\Registration\UI\WEB\Requests\FindRegistrationByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindRegistrationByIdController extends WebController
{
    public function show(FindRegistrationByIdRequest $request)
    {
        $registration = app(FindRegistrationByIdAction::class)->run($request);
        // ...
    }
}
