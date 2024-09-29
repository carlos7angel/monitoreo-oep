<?php

namespace App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers;

use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Accreditation\Actions\CreateAccreditationAction;
use App\Containers\CoreMonitoring\Accreditation\Actions\GetAccreditationsJsonDataTableAction;
use App\Containers\CoreMonitoring\Accreditation\Actions\UpdateAccreditationAction;
use App\Containers\CoreMonitoring\Accreditation\Tasks\FindAccreditationByIdTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\ConvertJsonDataToProfileDataTask;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\Accreditation\GetGetAccreditationsDataTableRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\Accreditation\ShowDetailAccreditationRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\Accreditation\ShowEditAccreditationRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\Accreditation\ShowListAccreditationsElectionsRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\Accreditation\ShowNewAccreditationElectionsRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\Accreditation\StoreAccreditationRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\Accreditation\UpdateAccreditationRequest;
use App\Ship\Parents\Controllers\WebController;
use Exception;

class AccreditationController extends WebController
{
    public function listAccreditations(ShowListAccreditationsElectionsRequest $request)
    {
        $page_title = "Acreditaciones";
        return view('frontend@extAdministrator::accreditation.listAccreditations', [], compact('page_title'));
    }

    public function listAccreditationsJsonDt(GetGetAccreditationsDataTableRequest $request)
    {
        try {
            $data = app(GetAccreditationsJsonDataTableAction::class)->run($request);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function newAccreditation(ShowNewAccreditationElectionsRequest $request)
    {
        $page_title = "Nueva Acreditación";
        $user =  app(GetAuthenticatedUserByGuardTask::class)->run('external');
        return view('frontend@extAdministrator::accreditation.newAccreditation', ['profile' => $user->profile_data], compact('page_title'));
    }

    public function store(StoreAccreditationRequest $request)
    {
        try {
            $accreditation = app(CreateAccreditationAction::class)->run($request);
            return response()->json(['success' => true, 'accreditation' => $accreditation, 'redirect' => route('ext_admin_accreditations_list')]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function detailAccreditation(ShowDetailAccreditationRequest $request)
    {
        $page_title = "Acreditación";
        $user =  app(GetAuthenticatedUserByGuardTask::class)->run('external');
        $accreditation = app(FindAccreditationByIdTask::class)->run($request->id);
        $profile = app(ConvertJsonDataToProfileDataTask::class)->run($accreditation->data);
        return view('frontend@extAdministrator::accreditation.detailAccreditation', [
            'accreditation' => $accreditation,
            'profile' => $profile
        ], compact('page_title'));
    }

    public function editAccreditation(ShowEditAccreditationRequest $request)
    {
        $page_title = "Editar Acreditación";
        $user =  app(GetAuthenticatedUserByGuardTask::class)->run('external');
        $accreditation = app(FindAccreditationByIdTask::class)->run($request->id);
        if($accreditation->status !== 'observed') {
            return redirect()->route('ext_admin_accreditations_list');
        }
        return view('frontend@extAdministrator::accreditation.editAccreditation', [
            'accreditation' => $accreditation,
            'profile' => $user->profile_data
        ], compact('page_title'));
    }

    public function update(UpdateAccreditationRequest $request)
    {
        try {
            $accreditation = app(UpdateAccreditationAction::class)->run($request);
            return response()->json(['success' => true, 'accreditation' => $accreditation, 'redirect' => route('ext_admin_accreditations_list')]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
