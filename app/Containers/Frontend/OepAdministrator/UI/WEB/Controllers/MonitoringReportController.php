<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Containers\CoreMonitoring\Election\Tasks\GetActiveElectionsForMonitoringTask;
use App\Containers\CoreMonitoring\FormBuilder\Actions\GetFieldsFormByTypeAction;
use App\Containers\CoreMonitoring\Monitoring\Actions\AddItemsForMonitoringReportAction;
use App\Containers\CoreMonitoring\Monitoring\Actions\CreateMonitoringReportAction;
use App\Containers\CoreMonitoring\Monitoring\Actions\GetMonitoringReportsJsonDTAction;
use App\Containers\CoreMonitoring\Monitoring\Actions\ListAvailableMonitoringItemsAction;
use App\Containers\CoreMonitoring\Monitoring\Actions\RemoveItemFromMonitoringReportAction;
use App\Containers\CoreMonitoring\Monitoring\Actions\UpdateStatusMonitoringReportAction;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringByIdTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringReportByIdTask;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringReport\AddMonitoringItemsForMonitoringReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringReport\ChangeStatusMonitoringReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringReport\CreateMonitoringReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringReport\DetailMonitoringItemFromMonitoringReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringReport\DetailMonitoringReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringReport\ListAvailableMonitoringItemsForReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringReport\ListMonitoringReportJsonDtRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringReport\ListMonitoringReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringReport\RemoveMonitoringItemFromMonitoringReportRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringReport\ShowPartialActiveElectionsForReportRequest;
use App\Ship\Parents\Controllers\WebController;
use Exception;

class MonitoringReportController extends WebController
{
    public function list(ListMonitoringReportRequest $request)
    {
        $page_title = "Reportes de Monitoreo";
        $elections = app(GetActiveElectionsForMonitoringTask::class)->run();
        return view('frontend@oepAdministrator::monitoringReport.list', ['elections' => $elections], compact('page_title'));
    }

    public function listJsonDt(ListMonitoringReportJsonDtRequest $request)
    {
        try {
            $data = app(GetMonitoringReportsJsonDTAction::class)->run($request);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function showElections(ShowPartialActiveElectionsForReportRequest $request)
    {
        try {
            $elections = app(GetActiveElectionsForMonitoringTask::class)->run();
            $render = view('frontend@oepAdministrator::monitoringReport.partials.listElections')->with([
                'elections' => $elections,
            ])->render();
            return response()->json(['success' => true, 'render' => $render]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function create(CreateMonitoringReportRequest $request)
    {
        try {
            $report = app(CreateMonitoringReportAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => '']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function detail(DetailMonitoringReportRequest $request)
    {
        $page_title = "Detalle Reporte de Monitoreo";
        $monitoring_report = app(FindMonitoringReportByIdTask::class)->run($request->id);
        return view('frontend@oepAdministrator::monitoringReport.detail', ['monitoring_report' => $monitoring_report], compact('page_title'));
    }

    public function removeItem(RemoveMonitoringItemFromMonitoringReportRequest $request)
    {
        try {
            $report = app(RemoveItemFromMonitoringReportAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => '']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function detailItem(DetailMonitoringItemFromMonitoringReportRequest $request)
    {
        try {
            $monitoring_item = app(FindMonitoringByIdTask::class)->run($request->monitoring_item_id);
            $election = app(FindElectionByIdTask::class)->run($monitoring_item->fid_election);
            [$form, $fields] = app(GetFieldsFormByTypeAction::class)->run($monitoring_item->media_type, $election);
            $render = view('frontend@oepAdministrator::monitoring.partials.detailMonitoringItem')->with([
                'monitoring' => $monitoring_item,
                'form' => $form,
                'fields' => $fields,
            ])->render();
            return response()->json(['success' => true, 'render' => $render]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function listAvailableMonitoringItems(ListAvailableMonitoringItemsForReportRequest $request)
    {
        try {
            $monitoring_report = app(FindMonitoringReportByIdTask::class)->run($request->id);
            $monitoring_items = app(ListAvailableMonitoringItemsAction::class)->run($request);
            $render = view('frontend@oepAdministrator::monitoringReport.partials.listMonitoringItems')->with([
                'monitoring_items' => $monitoring_items,
                'monitoring_report' => $monitoring_report,
            ])->render();
            return response()->json(['success' => true, 'render' => $render]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function addItems(AddMonitoringItemsForMonitoringReportRequest $request)
    {
        try {
            $data = app(AddItemsForMonitoringReportAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => '']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


    public function changeStatus(ChangeStatusMonitoringReportRequest $request)
    {
        try {
            $data = app(UpdateStatusMonitoringReportAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => '']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }




}
