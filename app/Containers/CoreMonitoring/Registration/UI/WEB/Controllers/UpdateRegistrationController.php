<?php

namespace App\Containers\CoreMonitoring\Registration\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Registration\Actions\FindRegistrationByIdAction;
use App\Containers\CoreMonitoring\Registration\Actions\UpdateRegistrationAction;
use App\Containers\CoreMonitoring\Registration\UI\WEB\Requests\EditRegistrationRequest;
use App\Containers\CoreMonitoring\Registration\UI\WEB\Requests\UpdateRegistrationRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateRegistrationController extends WebController
{
    public function edit(EditRegistrationRequest $request)
    {
        $registration = app(FindRegistrationByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateRegistrationRequest $request)
    {
        $registration = app(UpdateRegistrationAction::class)->run($request);
        // ...
    }
}
