<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Accreditation\Actions\GeneratePdfAccreditationAction;
use App\Containers\CoreMonitoring\Accreditation\Actions\GenerateXlsAccreditationsByElectionAction;
use App\Containers\CoreMonitoring\Accreditation\Actions\GetAdminAccreditationsByElectionJsonDataTableAction;
use App\Containers\CoreMonitoring\Accreditation\Actions\GetAdminElectionsForAccreditationsJsonDataTableAction;
use App\Containers\CoreMonitoring\Accreditation\Actions\UpdateStatusAccreditationAction;
use App\Containers\CoreMonitoring\Accreditation\Tasks\FindAccreditationByIdTask;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\ConvertJsonDataToProfileDataTask;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Accreditation\DetailAccreditationRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Accreditation\ListAccreditationsByElectionJsonDtRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Accreditation\ListAccreditationsByElectionRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Accreditation\ListElectionsForAccreditationJsonDtRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Accreditation\ListElectionsForAccreditationRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Accreditation\ReportPdfAccreditationRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Accreditation\ReportXlsAccreditationsByElectionRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Accreditation\UpdateStatusAccreditationRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\WebController;
use Exception;

class AccreditationController extends WebController
{
    public function listElectionsForAccreditation(ListElectionsForAccreditationRequest $request)
    {
        $page_title = "Procesos Electorales";
        return view('frontend@oepAdministrator::accreditation.listElections', [], compact('page_title'));
    }

    public function listElectionsForAccreditationJsonDt(ListElectionsForAccreditationJsonDtRequest $request)
    {
        try {
            $data = app(GetAdminElectionsForAccreditationsJsonDataTableAction::class)->run($request);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function listAccreditationsByElection(ListAccreditationsByElectionRequest $request)
    {
        $page_title = "Acreditaciones";
        $election = app(FindElectionByIdTask::class)->run($request->id);
        return view('frontend@oepAdministrator::accreditation.listByElection', [
            'election' => $election
        ], compact('page_title'));
    }

    public function listAccreditationsByElectionJsonDt(ListAccreditationsByElectionJsonDtRequest $request)
    {
        try {
            $data = app(GetAdminAccreditationsByElectionJsonDataTableAction::class)->run($request);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function detailAccreditation(DetailAccreditationRequest $request)
    {
        $page_title = "Acreditación";
        $accreditation = app(FindAccreditationByIdTask::class)->run($request->id);
        $profile = app(ConvertJsonDataToProfileDataTask::class)->run($accreditation->data);
        return view('frontend@oepAdministrator::accreditation.detailAccreditation', [
            'accreditation' => $accreditation,
            'profile_data' => $profile
        ], compact('page_title'));
    }

    public function updateStatusAccreditation(UpdateStatusAccreditationRequest $request)
    {
        try {
            $data = app(UpdateStatusAccreditationAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => '']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function pdfAccreditation(ReportPdfAccreditationRequest $request)
    {
        try {
            return app(GeneratePdfAccreditationAction::class)->run($request);
        } catch (Exception $e) {
            throw new NotFoundException('No se pudo generar el archivo PDF');
        }
    }

    public function xlsAccreditationsByElection(ReportXlsAccreditationsByElectionRequest $request)
    {
        try {
            return app(GenerateXlsAccreditationsByElectionAction::class)->run($request);
        } catch (Exception $e) {
            throw new NotFoundException('No se pudo generar el archivo PDF');
        }
    }

}
