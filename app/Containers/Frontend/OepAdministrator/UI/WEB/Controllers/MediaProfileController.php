<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Accreditation\Tasks\ListAccreditationsByUserMediaProfileTask;
use App\Containers\CoreMonitoring\UserProfile\Actions\EnableUserMediaProfileAccountAction;
use App\Containers\CoreMonitoring\UserProfile\Actions\GetAllUserMediaProfilesJsonDataTableAction;
use App\Containers\CoreMonitoring\UserProfile\Actions\GetNewUserMediaProfilesJsonDataTableAction;
use App\Containers\CoreMonitoring\UserProfile\Tasks\FindUserMediaProfileByIdTask;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MediaProfile\EnableUserMediaProfileAccountRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MediaProfile\GetAllUserMediaProfilesJsonDataTableRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MediaProfile\GetNewUserMediaProfilesJsonDataTableRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MediaProfile\ListAllUserMediaProfilesRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MediaProfile\ListNewUserMediaProfilesRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MediaProfile\ShowDetailNewUserMediaProfileRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MediaProfile\ShowDetailUserMediaProfileRequest;
use App\Ship\Parents\Controllers\WebController;
use Exception;

class MediaProfileController extends WebController
{
    public function list(ListAllUserMediaProfilesRequest $request)
    {
        $page_title = "Todos los Medios";
        return view('frontend@oepAdministrator::mediaProfile.listAll', [], compact('page_title'));
    }

    public function listJsonDt(GetAllUserMediaProfilesJsonDataTableRequest $request)
    {
        try {
            $data = app(GetAllUserMediaProfilesJsonDataTableAction::class)->run($request);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function listNew(ListNewUserMediaProfilesRequest $request)
    {
        $page_title = "Nuevos Registros de Medios";
        return view('frontend@oepAdministrator::mediaProfile.listNew', [], compact('page_title'));
    }

    public function listNewJsonDt(GetNewUserMediaProfilesJsonDataTableRequest $request)
    {
        try {
            $data = app(GetNewUserMediaProfilesJsonDataTableAction::class)->run($request);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function showDetailNew(ShowDetailNewUserMediaProfileRequest $request)
    {
        try {
            $media = app(FindUserMediaProfileByIdTask::class)->run($request->id);
            $render = view('frontend@oepAdministrator::mediaProfile.partials.detailsNew')->with([
                'media_profile' => $media,
            ])->render();
            return response()->json(['success' => true, 'render' => $render]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'render' => null, 'message' => $e->getMessage()]);
        }
    }

    public function enableAccount(EnableUserMediaProfileAccountRequest $request)
    {
        try {
            $data = app(EnableUserMediaProfileAccountAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => '', 'data' => $data]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function showDetail(ShowDetailUserMediaProfileRequest $request)
    {
        $page_title = "Medio de Comunicación";
        $media = app(FindUserMediaProfileByIdTask::class)->run($request->id);
        $accreditations = app(ListAccreditationsByUserMediaProfileTask::class)->run($media->id);
        return view('frontend@oepAdministrator::mediaProfile.detail', [
            'profile' => $media,
            'accreditations' => $accreditations
        ], compact('page_title'));
    }

}
