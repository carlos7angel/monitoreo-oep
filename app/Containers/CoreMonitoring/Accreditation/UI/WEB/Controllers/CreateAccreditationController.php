<?php

namespace App\Containers\CoreMonitoring\Accreditation\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Accreditation\Actions\CreateAccreditationAction;
use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Requests\CreateAccreditationRequest;
use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Requests\StoreAccreditationRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateAccreditationController extends WebController
{
    public function create(CreateAccreditationRequest $request)
    {
    }

    public function store(StoreAccreditationRequest $request)
    {
        $accreditation = app(CreateAccreditationAction::class)->run($request);
        // ...
    }
}
