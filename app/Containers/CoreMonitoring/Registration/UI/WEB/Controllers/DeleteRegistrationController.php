<?php

namespace App\Containers\CoreMonitoring\Registration\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Registration\Actions\DeleteRegistrationAction;
use App\Containers\CoreMonitoring\Registration\UI\WEB\Requests\DeleteRegistrationRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteRegistrationController extends WebController
{
    public function destroy(DeleteRegistrationRequest $request)
    {
        $result = app(DeleteRegistrationAction::class)->run($request);
        // ...
    }
}
