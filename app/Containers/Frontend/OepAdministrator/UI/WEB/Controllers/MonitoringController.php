<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Actions\GetFieldsFormByTypeAction;
use App\Containers\CoreMonitoring\Monitoring\Actions\GetElectionsForMonitoringJsonDataTableAction;
use App\Containers\CoreMonitoring\Monitoring\Actions\GetMonitoringByElectionJsonDataTableAction;
use App\Containers\CoreMonitoring\Monitoring\Actions\StoreMonitoringAction;
use App\Containers\CoreMonitoring\Monitoring\Actions\UpdateMonitoringAction;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringByIdTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\GetAccreditedUserMediaProfilesByElectionTask;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Monitoring\CreateMonitoringRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Monitoring\DetailMonitoringRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Monitoring\EditMonitoringRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Monitoring\ListElectionsForMonitoringJsonDtRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Monitoring\ListElectionsForMonitoringRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Monitoring\ListMonitoringByElectionJsonDtRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Monitoring\ListMonitoringByElectionRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Monitoring\StoreMonitoringRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Monitoring\UpdateMonitoringRequest;
use App\Ship\Parents\Controllers\WebController;
use Exception;

class MonitoringController extends WebController
{
    public function listElectionsForMonitoring(ListElectionsForMonitoringRequest $request)
    {
        $page_title = "Procesos Electorales para Monitoreo";
        return view('frontend@oepAdministrator::monitoring.listElections', [], compact('page_title'));
    }

    public function listElectionsForMonitoringJsonDt(ListElectionsForMonitoringJsonDtRequest $request)
    {
        try {
            $data = app(GetElectionsForMonitoringJsonDataTableAction::class)->run($request);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function listMonitoringByElection(ListMonitoringByElectionRequest $request)
    {
        $page_title = "Registros de Monitoreo";
        $election = app(FindElectionByIdTask::class)->run($request->id);
        return view('frontend@oepAdministrator::monitoring.listByElection', [
            'election' => $election
        ], compact('page_title'));
    }

    public function listMonitoringByElectionJsonDt(ListMonitoringByElectionJsonDtRequest $request)
    {
//        try {
            $data = app(GetMonitoringByElectionJsonDataTableAction::class)->run($request);
            return response()->json($data);
//        } catch (Exception $e) {
//            return response()->json(['success' => false, 'message' => $e->getMessage()]);
//        }
    }

    public function createMonitoring(CreateMonitoringRequest $request)
    {
        $page_title = "Nuevo Registro de Monitoreo";
        $election = app(FindElectionByIdTask::class)->run($request->id);
        [$form, $fields] = app(GetFieldsFormByTypeAction::class)->run($request->media, $election);
        $medias = app(GetAccreditedUserMediaProfilesByElectionTask::class)->run($election->id);
        return view('frontend@oepAdministrator::monitoring.createMonitoring', [
            'election' => $election,
            'form' => $form,
            'fields' => $fields,
            'media_type' => $request->media,
            'medias' => $medias
        ], compact('page_title'));
    }

    public function storeMonitoring(StoreMonitoringRequest $request)
    {
        try {
            $monitoring = app(StoreMonitoringAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => route('oep_admin_media_monitoring_edit', ['election_id' => $request->id, 'id' => $monitoring->id])]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function editMonitoring(EditMonitoringRequest $request)
    {
        $page_title = "Editar Registro de Monitoreo";
        $monitoring = app(FindMonitoringByIdTask::class)->run($request->id);
        $election = app(FindElectionByIdTask::class)->run($monitoring->fid_election);
        [$form, $fields] = app(GetFieldsFormByTypeAction::class)->run($monitoring->media_type, $election);
        $medias = app(GetAccreditedUserMediaProfilesByElectionTask::class)->run($election->id);
        return view('frontend@oepAdministrator::monitoring.editMonitoring', [
            'monitoring' => $monitoring,
            'election' => $election,
            'form' => $form,
            'fields' => $fields,
            'medias' => $medias
        ], compact('page_title'));
    }

    public function updateMonitoring(UpdateMonitoringRequest $request)
    {
        try {
            $monitoring = app(UpdateMonitoringAction::class)->run($request);
            return response()->json([
                'success' => true,
                'redirect' => route('oep_admin_media_monitoring_edit', [
                    'election_id' => $request->election_id,
                    'id' => $monitoring->id
                ])
            ]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function detailMonitoring(DetailMonitoringRequest $request)
    {
        $page_title = "Detalle Registro de Monitoreo";
        $monitoring = app(FindMonitoringByIdTask::class)->run($request->id);
        $election = app(FindElectionByIdTask::class)->run($monitoring->fid_election);
        [$form, $fields] = app(GetFieldsFormByTypeAction::class)->run($monitoring->media_type, $election);
        return view('frontend@oepAdministrator::monitoring.detailMonitoring', [
            'monitoring' => $monitoring,
            'election' => $election,
            'form' => $form,
            'fields' => $fields,
        ], compact('page_title'));
    }


}
