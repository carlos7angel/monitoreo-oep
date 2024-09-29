<?php

namespace App\Containers\CoreMonitoring\Accreditation\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Accreditation\Actions\FindAccreditationByIdAction;
use App\Containers\CoreMonitoring\Accreditation\Actions\UpdateAccreditationAction;
use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Requests\EditAccreditationRequest;
use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Requests\UpdateAccreditationRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateAccreditationController extends WebController
{
    public function edit(EditAccreditationRequest $request)
    {
        $accreditation = app(FindAccreditationByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateAccreditationRequest $request)
    {
        $accreditation = app(UpdateAccreditationAction::class)->run($request);
        // ...
    }
}
