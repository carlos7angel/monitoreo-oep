<?php

namespace App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Registration\Actions\GetRegistrationElectionsJsonDTAction;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\GetRegistrationElectionsDataTableRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\Registration\ListRegistrationElectionsRequest;
use App\Ship\Parents\Controllers\WebController;
use Exception;

class RegistrationController extends WebController
{
    public function listRegistrations(ListRegistrationElectionsRequest $request)
    {
        $page_title = "Registros a Procesos Electorales";
        return view('frontend@extAdministrator::registration.listRegistrations', [], compact('page_title'));
    }

    public function listRegistrationsJsonDt(GetRegistrationElectionsDataTableRequest $request)
    {
        try {
            $data = app(GetRegistrationElectionsJsonDTAction::class)->run($request);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

}
