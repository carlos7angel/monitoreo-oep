<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Analysis\Actions\ComplementaryAnalysisReportAction;
use App\Containers\CoreMonitoring\Analysis\Actions\CreateAnalysisReportAction;
use App\Containers\CoreMonitoring\Analysis\Actions\FinalResolutionAnalysisReportAction;
use App\Containers\CoreMonitoring\Analysis\Actions\FirstResolutionAnalysisReportAction;
use App\Containers\CoreMonitoring\Analysis\Actions\GetAnalysisReportsJsonDTAction;
use App\Containers\CoreMonitoring\Analysis\Actions\InTreatmentAnalysisReportAction;
use App\Containers\CoreMonitoring\Analysis\Actions\RejectAnalysisReportAction;
use App\Containers\CoreMonitoring\Analysis\Actions\SecondResolutionAnalysisReportAction;
use App\Containers\CoreMonitoring\Analysis\Actions\ToSecretariatAnalysisReportAction;
use App\Containers\CoreMonitoring\Analysis\Tasks\FindAnalysisReportByIdTask;
use App\Containers\CoreMonitoring\Analysis\Tasks\GetActivitiesByAnalysisReportTask;
use App\Containers\CoreMonitoring\Election\Tasks\GetActiveElectionsForMonitoringTask;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\AnalysisReport\ComplementaryAnalysisReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\AnalysisReport\FinalResolutionAnalysisReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\AnalysisReport\FirstResolutionAnalysisReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\AnalysisReport\InTreatmentAnalysisReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\AnalysisReport\CreateAnalysisReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\AnalysisReport\DetailAnalysisReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\AnalysisReport\EditFormAnalysisReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\AnalysisReport\ListAnalysisReportJsonDtRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\AnalysisReport\ListAnalysisReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\AnalysisReport\RejectAnalysisReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\AnalysisReport\SecondResolutionAnalysisReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\AnalysisReport\ToSecretariatAnalysisReportRequest;
use App\Ship\Parents\Controllers\WebController;
use Exception;

class AnalysisReportController extends WebController
{
    public function createAnalysis(CreateAnalysisReportRequest $request)
    {
        try {
            $analysis = app(CreateAnalysisReportAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => route('oep_admin_analysis_report_list')]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function listAnalysis(ListAnalysisReportRequest $request)
    {
        $page_title = "Informes de Análisis de Monitoreo";
        $elections = app(GetActiveElectionsForMonitoringTask::class)->run();
        return view('frontend@oepAdministrator::analysisReport.list', [
            'elections' => $elections
        ], compact('page_title'));
    }

    public function listJsonDt(ListAnalysisReportJsonDtRequest $request)
    {
        try {
            $data = app(GetAnalysisReportsJsonDTAction::class)->run($request);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function detailAnalysis(DetailAnalysisReportRequest $request)
    {
        $page_title = "Detalle Informe de Análisis";
        $analysis_report = app(FindAnalysisReportByIdTask::class)->run($request->id);
        $activities = app(GetActivitiesByAnalysisReportTask::class)->run($analysis_report->id);
        return view('frontend@oepAdministrator::analysisReport.detail', [
            'analysis_report' => $analysis_report,
            'activities' => $activities
        ], compact('page_title'));
    }

    public function editFormAnalysis(EditFormAnalysisReportRequest $request)
    {
        try {
            $analysis_report = app(FindAnalysisReportByIdTask::class)->run($request->id);
            $render = view('frontend@oepAdministrator::analysisReport.partials.editForm')->with([
                'analysis_report' => $analysis_report,
            ])->render();
            return response()->json(['success' => true, 'render' => $render]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function rejectAnalysis(RejectAnalysisReportRequest $request)
    {
        try {
            $analysis = app(RejectAnalysisReportAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $analysis]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function toSecretariatAnalysis(ToSecretariatAnalysisReportRequest $request)
    {
        try {
            $analysis = app(ToSecretariatAnalysisReportAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $analysis]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function inTreatmentAnalysis(InTreatmentAnalysisReportRequest $request)
    {
        try {
            $analysis = app(InTreatmentAnalysisReportAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $analysis]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function complementaryAnalysis(ComplementaryAnalysisReportRequest $request)
    {
        try {
            $analysis = app(ComplementaryAnalysisReportAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $analysis]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function firstResolutionAnalysis(FirstResolutionAnalysisReportRequest $request)
    {
        try {
            $analysis = app(FirstResolutionAnalysisReportAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $analysis]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function secondResolutionAnalysis(SecondResolutionAnalysisReportRequest $request)
    {
        try {
            $analysis = app(SecondResolutionAnalysisReportAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $analysis]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function finalResolutionAnalysis(FinalResolutionAnalysisReportRequest $request)
    {
        try {
            $analysis = app(FinalResolutionAnalysisReportAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $analysis]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


}
