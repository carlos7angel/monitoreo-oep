<?php

namespace App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Registration\Actions\DeletePropagandaMaterialAction;
use App\Containers\CoreMonitoring\Registration\Actions\StorePropagandaMaterialAction;
use App\Containers\CoreMonitoring\Registration\Actions\UpdatePropagandaMaterialAction;
use App\Containers\CoreMonitoring\Registration\Tasks\FindPropagandaMaterialByIdTask;
use App\Containers\CoreMonitoring\Registration\Tasks\FindRegistrationByIdTask;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\PropagandaMaterial\CreatePropagandaMaterialByElectionRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\PropagandaMaterial\DeletePropagandaMaterialByElectionRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\PropagandaMaterial\EditPropagandaMaterialByElectionRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\PropagandaMaterial\ListPropagandaMaterialByElectionRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\PropagandaMaterial\StorePropagandaMaterialByElectionRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\PropagandaMaterial\UpdatePropagandaMaterialByElectionRequest;
use App\Ship\Parents\Controllers\WebController;
use Exception;

class PropagandaMaterialController extends WebController
{
    public function listMaterial(ListPropagandaMaterialByElectionRequest$request)
    {
        $page_title = "Material de Propaganda Electoral";
        $registration = app(FindRegistrationByIdTask::class)->run($request->id);
        return view('frontend@extAdministrator::propagandaMaterial.listMaterial', ['registration' => $registration], compact('page_title'));
    }

    public function createMaterial(CreatePropagandaMaterialByElectionRequest $request)
    {
        $page_title = "Nuevo Material";
        $registration = app(FindRegistrationByIdTask::class)->run($request->id);
        return view('frontend@extAdministrator::propagandaMaterial.createMaterial', ['registration' => $registration], compact('page_title'));
    }

    public function storeMaterial(StorePropagandaMaterialByElectionRequest $request)
    {
        try {
            $material = app(StorePropagandaMaterialAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => route('ext_admin_propaganda_material_by_election_list', ['id' => $request->id])]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function editMaterial(EditPropagandaMaterialByElectionRequest $request)
    {
        $page_title = "Editar Material";
        $registration = app(FindRegistrationByIdTask::class)->run($request->registration_id);
        $material = app(FindPropagandaMaterialByIdTask::class)->run($request->id);
        return view('frontend@extAdministrator::propagandaMaterial.editMaterial', ['registration' => $registration, 'material' => $material], compact('page_title'));
    }

    public function updateMaterial(UpdatePropagandaMaterialByElectionRequest $request)
    {
        try {
            $material = app(UpdatePropagandaMaterialAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => route('ext_admin_propaganda_material_edit', ['registration_id' => $request->registration_id, 'id' => $material->id])]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function deleteMaterial(DeletePropagandaMaterialByElectionRequest $request)
    {
        try {
            $data = app(DeletePropagandaMaterialAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => '', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

}
