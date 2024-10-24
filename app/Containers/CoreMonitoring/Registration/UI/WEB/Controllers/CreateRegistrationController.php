<?php

namespace App\Containers\CoreMonitoring\Registration\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Registration\Actions\CreateRegistrationAction;
use App\Containers\CoreMonitoring\Registration\UI\WEB\Requests\CreateRegistrationRequest;
use App\Containers\CoreMonitoring\Registration\UI\WEB\Requests\StoreRegistrationRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateRegistrationController extends WebController
{
    public function create(CreateRegistrationRequest $request)
    {
    }

    public function store(StoreRegistrationRequest $request)
    {
        $registration = app(CreateRegistrationAction::class)->run($request);
        // ...
    }
}
