<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Election\Tasks\GetActiveElectionsForPoliticalRegistrationTask;
use App\Containers\CoreMonitoring\Registration\Actions\GetElectionsRegisteredByPoliticalGroupJsonDataTableAction;
use App\Containers\CoreMonitoring\Registration\Actions\RegisterPoliticalGroupProfileElectionAction;
use App\Containers\CoreMonitoring\UserProfile\Actions\EnableUserPoliticalGroupProfileAccountAction;
use App\Containers\CoreMonitoring\UserProfile\Actions\GetUserPoliticalGroupProfilesJsonDataTableAction;
use App\Containers\CoreMonitoring\UserProfile\Actions\StorePoliticalGroupAction;
use App\Containers\CoreMonitoring\UserProfile\Actions\UpdatePoliticalGroupAction;
use App\Containers\CoreMonitoring\UserProfile\Tasks\FindUserPoliticalGroupProfileByIdTask;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\PoliticalGroup\CreatePoliticalGroupRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\PoliticalGroup\DetailPoliticalGroupRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\PoliticalGroup\EditPoliticalGroupRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\PoliticalGroup\EnableUserPoliticalGroupProfileAccountRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\PoliticalGroup\GetElectionsByPoliticalGroupProfileJsonDataTableRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\PoliticalGroup\GetUserPoliticalGroupProfilesJsonDataTableRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\PoliticalGroup\ListPoliticalGroupProfilesRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\PoliticalGroup\RegisterUserPoliticalGroupProfileElectionRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\PoliticalGroup\StorePoliticalGroupRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\PoliticalGroup\UpdatePoliticalGroupRequest;
use App\Ship\Parents\Controllers\WebController;
use Exception;

class PoliticalGroupProfileController extends WebController
{
    public function create(CreatePoliticalGroupRequest $request)
    {
        $page_title = "Nuevo";
        return view('frontend@oepAdministrator::politicalGroup.create', [], compact('page_title'));
    }

    public function store(StorePoliticalGroupRequest $request)
    {
        try {
            $pp = app(StorePoliticalGroupAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => route('oep_admin_political_group_edit', ['id' => $pp->id])]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit(EditPoliticalGroupRequest $request)
    {
        $page_title = "Editar Partido Político";
        $pp = app(FindUserPoliticalGroupProfileByIdTask::class)->run($request->id);
        return view('frontend@oepAdministrator::politicalGroup.edit', ['pp' => $pp], compact('page_title'));
    }

    public function update(UpdatePoliticalGroupRequest $request)
    {
        try {
            $pp = app(UpdatePoliticalGroupAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => route('oep_admin_political_group_edit', ['id' => $pp->id])]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function list(ListPoliticalGroupProfilesRequest $request)
    {
        $page_title = "Partidos Políticos";
        return view('frontend@oepAdministrator::politicalGroup.list', [], compact('page_title'));
    }

    public function listJsonDt(GetUserPoliticalGroupProfilesJsonDataTableRequest $request)
    {
        try {
            $data = app(GetUserPoliticalGroupProfilesJsonDataTableAction::class)->run($request);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


    public function detail(DetailPoliticalGroupRequest $request)
    {
        $page_title = "Partido Político";
        $pp = app(FindUserPoliticalGroupProfileByIdTask::class)->run($request->id);
        $elections = app(GetActiveElectionsForPoliticalRegistrationTask::class)->run($request->id);
        return view('frontend@oepAdministrator::politicalGroup.detail', ['pp' => $pp, 'elections' => $elections], compact('page_title'));
    }

    public function enableAccount(EnableUserPoliticalGroupProfileAccountRequest $request)
    {
        try {
            $data = app(EnableUserPoliticalGroupProfileAccountAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => '', 'data' => $data]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function listElectionsJsonDt(GetElectionsByPoliticalGroupProfileJsonDataTableRequest $request)
    {
        try {
            $data = app(GetElectionsRegisteredByPoliticalGroupJsonDataTableAction::class)->run($request);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function registerElection(RegisterUserPoliticalGroupProfileElectionRequest $request)
    {
        try {
            $registered = app(RegisterPoliticalGroupProfileElectionAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $registered]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


}
