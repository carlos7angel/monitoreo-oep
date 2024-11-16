<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers;

use App\Containers\AppSection\Authentication\Actions\ForgotPasswordAction;
use App\Containers\AppSection\Authentication\Actions\ResetPasswordAction;
use App\Containers\AppSection\Authentication\Actions\WebLogoutAction;
use App\Containers\AppSection\Authentication\Actions\WebOepAdministratorLoginAction;
use App\Containers\AppSection\Authentication\UI\WEB\Requests\ForgotPasswordRequest;
use App\Containers\AppSection\Authentication\UI\WEB\Requests\LoginRequest;
use App\Containers\AppSection\Authentication\UI\WEB\Requests\LogoutRequest;
use App\Containers\AppSection\Authentication\UI\WEB\Requests\ResetPasswordRequest;
use App\Ship\Parents\Controllers\WebController;
use App\Ship\Parents\Exceptions\Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends WebController
{
    public function showLoginPage()
    {
        $page_title = "Ingreso";
        if(Auth::guard('web')->check())
            return redirect()->route('oep_admin_index');
        return view('frontend@oepAdministrator::authentication.login', [], compact('page_title'));
    }

    public function postLogin(LoginRequest $request): JsonResponse
    {
        try {
            app(WebOepAdministratorLoginAction::class)->run($request);
            return response()->json(['success' => true, 'message' => 'Ingreso satisfactorio', 'redirect' => route('oep_admin_index')]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function postLogout(LogoutRequest $request)
    {
        app(WebLogoutAction::class)->run();
        $request->session()->flush();
        return redirect()->route('oep_admin_login');
    }

    public function showForgotPasswordPage()
    {
        $page_title = "Olvidaste tu contraseña";
        if(Auth::guard('web')->check())
            return redirect()->route('oep_admin_index');
        return view('frontend@oepAdministrator::authentication.forgotPassword', [
            'reseturl' => url(route('oep_admin_login_reset_password'))
        ], compact('page_title'));
    }

    public function postForgotPassword(ForgotPasswordRequest $request): JsonResponse
    {
        try {
            app(ForgotPasswordAction::class)->run($request);
            return response()->json(['success' => true, 'message' => 'Correo enviado satisfactoriamente', 'redirect' => route('oep_admin_index')]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function showResetPasswordPage()
    {
        $page_title = "Restablecer contraseña";
        if(Auth::guard('web')->check())
            return redirect()->route('oep_admin_index');
        return view('frontend@oepAdministrator::authentication.resetPassword', [], compact('page_title'));
    }

    public function postResetPassword(ResetPasswordRequest $request): JsonResponse
    {
        try {
            app(ResetPasswordAction::class)->run($request);
            return response()->json(['success' => true, 'message' => 'Contraseña restablecida satisfactoriamente', 'redirect' => route('oep_admin_index')]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

}
