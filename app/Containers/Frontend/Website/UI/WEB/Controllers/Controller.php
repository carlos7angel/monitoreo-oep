<?php

namespace App\Containers\Frontend\Website\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\UserProfile\Actions\RegisterMediaProfileAction;
use App\Containers\Frontend\Website\UI\WEB\Requests\StoreFormMediaRequest;
use App\Ship\Exceptions\EmailAlreadyExistsException;
use App\Ship\Parents\Controllers\WebController;

class Controller extends WebController
{
    public function index()
    {
        $page_title = "Inicio";
        return view('frontend@website::index', [], compact('page_title'));
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


}
