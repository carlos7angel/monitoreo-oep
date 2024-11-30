<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers;

use App\Containers\AppSection\ActivityLog\Actions\GetAllActivityLogsJsonDTAction;
use App\Containers\AppSection\ActivityLog\Tasks\FindActivityLogByIdTask;
use App\Containers\AppSection\ActivityLog\Tasks\GetActivityLogTypesTask;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\ActivityLog\ListActivityLogsJsonDtRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\ActivityLog\ListActivityLogsRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\ActivityLog\ShowDetailActivityLogRequest;
use App\Ship\Parents\Controllers\WebController;
use Exception;

class ActivityLogController extends WebController
{
    public function list(ListActivityLogsRequest $request)
    {
        $page_title = "Logs de Actividad";
        $types = app(GetActivityLogTypesTask::class)->run();
        return view('frontend@oepAdministrator::activityLog.list', ['types' => $types], compact('page_title'));
    }

    public function listJsonDt(ListActivityLogsJsonDtRequest $request)
    {
        try {
            $data = app(GetAllActivityLogsJsonDTAction::class)->run($request);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function showDetail(ShowDetailActivityLogRequest $request)
    {
        try {
            $log = app(FindActivityLogByIdTask::class)->run($request->id);
            $render = view('frontend@oepAdministrator::activityLog.partials.detail')->with([
                'log' => $log,
            ])->render();
            return response()->json(['success' => true, 'render' => $render]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'render' => null, 'message' => $e->getMessage()]);
        }
    }


}
