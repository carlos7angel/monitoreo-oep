<?php

namespace App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers;

use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\UserProfile\Actions\StoreMediaProfileCategoryDataAction;
use App\Containers\CoreMonitoring\UserProfile\Actions\StoreMediaProfileContactDataAction;
use App\Containers\CoreMonitoring\UserProfile\Actions\StoreMediaProfileFileDataAction;
use App\Containers\CoreMonitoring\UserProfile\Actions\StoreMediaProfileGeneralDataAction;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\MediaProfile\ShowPageMediaProfileCategoryDataRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\MediaProfile\ShowPageMediaProfileContactDataRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\MediaProfile\ShowPageMediaProfileFileDataRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\MediaProfile\ShowPageMediaProfileGeneralDataRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\MediaProfile\StoreMediaProfileCategoryDataRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\MediaProfile\StoreMediaProfileContactDataRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\MediaProfile\StoreMediaProfileFileDataRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\MediaProfile\StoreMediaProfileGeneralDataRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Support\Facades\Auth;

class MediaProfileController extends WebController
{
    public function showGeneralData(ShowPageMediaProfileGeneralDataRequest $request)
    {
        $page_title = "Datos Generales";
        $user = Auth::guard('external')->user();
        return view('frontend@extAdministrator::mediaProfile.generalData', ['profile' => $user->profile_data], compact('page_title'));
    }

    public function storeGeneralData(StoreMediaProfileGeneralDataRequest $request)
    {
        try {
            $profile = app(StoreMediaProfileGeneralDataAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => route('ext_admin_media_profile_general_data_show')]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function showCategoryData(ShowPageMediaProfileCategoryDataRequest $request)
    {
        $page_title = "Tipo de Medio";
        $user =  app(GetAuthenticatedUserByGuardTask::class)->run('external');
        return view('frontend@extAdministrator::mediaProfile.categoryData', ['profile' => $user->profile_data], compact('page_title'));
    }

    public function storeCategoryData(StoreMediaProfileCategoryDataRequest $request)
    {
        try {
            $profile = app(StoreMediaProfileCategoryDataAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => route('ext_admin_media_profile_category_data_show')]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function showContactData(ShowPageMediaProfileContactDataRequest $request)
    {
        $page_title = "Datos de Contacto";
        $user =  app(GetAuthenticatedUserByGuardTask::class)->run('external');
        return view('frontend@extAdministrator::mediaProfile.contactData', ['profile' => $user->profile_data], compact('page_title'));
    }

    public function storeContactData(StoreMediaProfileContactDataRequest $request)
    {
        try {
            $profile = app(StoreMediaProfileContactDataAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => route('ext_admin_media_profile_contact_data_show')]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function showFileData(ShowPageMediaProfileFileDataRequest $request)
    {
        $page_title = "Archivos";
        $user =  app(GetAuthenticatedUserByGuardTask::class)->run('external');
        return view('frontend@extAdministrator::mediaProfile.fileData', ['profile' => $user->profile_data], compact('page_title'));
    }
    public function storeFileData(StoreMediaProfileFileDataRequest $request)
    {
        try {
            $profile = app(StoreMediaProfileFileDataAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => route('ext_admin_media_profile_file_data_show')]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

}
