<?php

namespace App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers;

use App\Containers\AppSection\Authentication\Actions\WebExtAdministratorLoginAction;
use App\Containers\AppSection\Authentication\Actions\WebExtLogoutAction;
use App\Containers\AppSection\Authentication\UI\WEB\Requests\LoginRequest;
use App\Containers\AppSection\Authentication\UI\WEB\Requests\LogoutRequest;
use App\Ship\Parents\Controllers\WebController;
use App\Ship\Parents\Exceptions\Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends WebController
{
    public function showLoginPage()
    {
        $page_title = "Ingreso";
        if(Auth::guard('external')->check())
            return redirect()->route('ext_admin_index');
        return view('frontend@extAdministrator::authentication.login', [], compact('page_title'));
    }

    public function postLogin(LoginRequest $request): JsonResponse
    {
        try {
            app(WebExtAdministratorLoginAction::class)->run($request);
            return response()->json(['success' => true, 'message' => 'Ingreso satisfactorio', 'redirect' => route('ext_admin_index')]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postLogout(LogoutRequest $request)
    {
        app(WebExtLogoutAction::class)->run();
        $request->session()->flush();
        return redirect()->route('ext_admin_login');
    }
}
