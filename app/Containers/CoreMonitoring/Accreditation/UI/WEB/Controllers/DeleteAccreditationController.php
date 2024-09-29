<?php

namespace App\Containers\CoreMonitoring\Accreditation\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Accreditation\Actions\DeleteAccreditationAction;
use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Requests\DeleteAccreditationRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteAccreditationController extends WebController
{
    public function destroy(DeleteAccreditationRequest $request)
    {
        $result = app(DeleteAccreditationAction::class)->run($request);
        // ...
    }
}
