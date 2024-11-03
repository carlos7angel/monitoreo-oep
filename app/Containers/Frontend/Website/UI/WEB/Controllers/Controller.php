<?php

namespace App\Containers\Frontend\Website\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\Accreditation\Actions\ListMediaAccreditationRatesScopeByElectionAction;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Containers\CoreMonitoring\Election\Tasks\ListElectionsTask;
use App\Containers\CoreMonitoring\Registration\Tasks\ListRegistrationsByElectionTask;
use App\Containers\CoreMonitoring\UserProfile\Actions\RegisterMediaProfileAction;
use App\Containers\Frontend\Website\UI\WEB\Requests\ListAccreditationRatesPageRequest;
use App\Containers\Frontend\Website\UI\WEB\Requests\ListMaterialPageRequest;
use App\Containers\Frontend\Website\UI\WEB\Requests\ShowElectionPageRequest;
use App\Containers\Frontend\Website\UI\WEB\Requests\StoreFormMediaRequest;
use App\Ship\Exceptions\EmailAlreadyExistsException;
use App\Ship\Parents\Controllers\WebController;

class Controller extends WebController
{
    public function index()
    {
        $page_title = "Inicio";
        $elections = app(ListElectionsTask::class)->run();
        return view('frontend@website::index', ['elections' => $elections], compact('page_title'));
    }

    public function showFormMedia()
    {
        $page_title = "Registro de Medios";
        return view('frontend@website::formMedia', [], compact('page_title'));
    }

    public function storeFormMedia(StoreFormMediaRequest $request)
    {
        try {
            $register = app(RegisterMediaProfileAction::class)->run($request);
            $success_render = view('frontend@website::partials.successMediaRegistration')->render();
            return response()->json(['success' => true, 'render' => $success_render]);
        } catch (EmailAlreadyExistsException $e) {
            return response()->json(['success' => false, 'fields' => [
                'media_email' => 'El correo electrónico ya esta registrado'
            ], 'message' => $e->getMessage()]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function showElectionPage(ShowElectionPageRequest $request)
    {
        $page_title = "Proceso Electoral";
        $election = app(FindElectionByIdTask::class)->run($request->id);
        return view('frontend@website::showElection', ['election' => $election], compact('page_title'));
    }

    public function listMaterialPage(ListMaterialPageRequest $request)
    {
        $page_title = "Material del Proceso Electoral";
        $election = app(FindElectionByIdTask::class)->run($request->id);
        $registrations = app(ListRegistrationsByElectionTask::class)->run($election->id);
        return view('frontend@website::listMaterial', ['election' => $election, 'registrations' => $registrations], compact('page_title'));
    }

    public function listAccreditationRatesPage(ListAccreditationRatesPageRequest $request)
    {
        $page_title = "Lista de Medios Habilitados";
        $election = app(FindElectionByIdTask::class)->run($request->id);
        $data = app(ListMediaAccreditationRatesScopeByElectionAction::class)->run($election->id);


        dd($data);

        return view('frontend@website::listAccreditationRates', ['election' => $election, 'rates' => $data], compact('page_title'));
    }

}
