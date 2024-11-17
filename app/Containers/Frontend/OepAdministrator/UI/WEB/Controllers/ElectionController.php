<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Accreditation\Tasks\ListAccreditationsByElectionTask;
use App\Containers\CoreMonitoring\Election\Actions\CreateElectionAction;
use App\Containers\CoreMonitoring\Election\Actions\GetAllElectionsJsonDataTableAction;
use App\Containers\CoreMonitoring\Election\Actions\UpdateElectionAction;
use App\Containers\CoreMonitoring\Election\Actions\UpdateStatusElectionAction;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Actions\GetAllFormsAction;
use App\Containers\CoreMonitoring\Monitoring\Tasks\ListMonitoringsTask;
use App\Containers\CoreMonitoring\Registration\Tasks\ListRegistrationsTask;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Election\CreateElectionRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Election\DetailElectionRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Election\EditElectionRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Election\GetAllElectionsJsonDataTableRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Election\ListElectionsRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Election\StoreElectionRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Election\UpdateElectionRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Election\UpdateStatusElectionRequest;
use App\Ship\Parents\Controllers\WebController;
use Exception;

class ElectionController extends WebController
{
    public function list(ListElectionsRequest $request)
    {
        $page_title = "Procesos Electorales";
        return view('frontend@oepAdministrator::election.list', [], compact('page_title'));
    }

    public function listJsonDt(GetAllElectionsJsonDataTableRequest $request)
    {
        try {
            $data = app(GetAllElectionsJsonDataTableAction::class)->run($request);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function create(CreateElectionRequest $request)
    {
        $page_title = "Nuevo";
        $forms = app(GetAllFormsAction::class)->run($request);
        return view('frontend@oepAdministrator::election.create', ['forms' => $forms], compact('page_title'));
    }

    public function store(StoreElectionRequest $request)
    {
        try {
            $election = app(CreateElectionAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => route('oep_admin_elections_edit', ['id' => $election->id])]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit(EditElectionRequest $request)
    {
        $page_title = "Editar Proceso Electoral";
        $forms = app(GetAllFormsAction::class)->run($request);
        $election = app(FindElectionByIdTask::class)->run($request->id);
        return view('frontend@oepAdministrator::election.edit', ['election' => $election, 'forms' => $forms], compact('page_title'));
    }

    public function update(UpdateElectionRequest $request)
    {
        try {
            $election = app(UpdateElectionAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => route('oep_admin_elections_edit', ['id' => $election->id])]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function detail(DetailElectionRequest $request)
    {
        $page_title = "Proceso Electoral";
        $election = app(FindElectionByIdTask::class)->run($request->id);
        $accreditations = app(ListAccreditationsByElectionTask::class)->run($election->id);
        $monitoring_items = app(ListMonitoringsTask::class)->run($election->id);
        $registrations = app(ListRegistrationsTask::class)->run($election->id);

        return view('frontend@oepAdministrator::election.detail', [
            'election' => $election,
            'accreditations' => $accreditations,
            'monitoring_items' => $monitoring_items,
            'registrations' => $registrations,
        ], compact('page_title'));
    }

    public function updateStatus(UpdateStatusElectionRequest $request)
    {
        try {
            $data = app(UpdateStatusElectionAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => '']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

}
