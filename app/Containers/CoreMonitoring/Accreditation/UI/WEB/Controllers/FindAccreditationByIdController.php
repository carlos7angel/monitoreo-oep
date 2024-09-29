<?php

namespace App\Containers\CoreMonitoring\Accreditation\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Accreditation\Actions\FindAccreditationByIdAction;
use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Requests\FindAccreditationByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindAccreditationByIdController extends WebController
{
    public function show(FindAccreditationByIdRequest $request)
    {
        $accreditation = app(FindAccreditationByIdAction::class)->run($request);
        // ...
    }
}
