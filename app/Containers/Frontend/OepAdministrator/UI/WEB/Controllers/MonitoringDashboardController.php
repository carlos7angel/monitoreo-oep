<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Analysis\Actions\GetAnalysisByStatusJsonAction;
use App\Containers\CoreMonitoring\Election\Tasks\ListElectionsTask;
use App\Containers\CoreMonitoring\Monitoring\Actions\GetMonitoringByMediaTypeJsonAction;
use App\Containers\CoreMonitoring\Monitoring\Actions\GetMonitoringByScopeJsonAction;
use App\Containers\CoreMonitoring\Monitoring\Actions\GetMonitoringByUserJsonAction;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringDashboard\GetAnalysisByStatusJsonRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringDashboard\GetMonitoringByMediaTypeJsonRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringDashboard\GetMonitoringByScopeJsonRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringDashboard\GetMonitoringByUserJsonRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringDashboard\ShowDashboardMonitoringPageRequest;
use App\Ship\Parents\Controllers\WebController;
use Exception;

class MonitoringDashboardController extends WebController
{
    public function showDashboardPage(ShowDashboardMonitoringPageRequest $request)
    {
        $page_title = "Reporte de Monitoreo y Análisis";
        $elections = app(ListElectionsTask::class)->run();
        return view('frontend@oepAdministrator::monitoring.dashboard', [
            'elections' => $elections,
            'selected_election' => $elections[0]->id
        ], compact('page_title'));
    }

    public function jsonMonitoringByScope(GetMonitoringByScopeJsonRequest $request)
    {
        try {
            $data = app(GetMonitoringByScopeJsonAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $data]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function jsonMonitoringByMediaType(GetMonitoringByMediaTypeJsonRequest $request)
    {
        try {
            $data = app(GetMonitoringByMediaTypeJsonAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $data]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function jsonAnalysisByStatus(GetAnalysisByStatusJsonRequest $request)
    {
        try {
            $data = app(GetAnalysisByStatusJsonAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $data]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function jsonMonitoringByUser(GetMonitoringByUserJsonRequest $request)
    {
        try {
            $data = app(GetMonitoringByUserJsonAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $data]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


}
