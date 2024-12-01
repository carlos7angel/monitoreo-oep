<?php

namespace App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers;

use App\Containers\AppSection\Authentication\Actions\ForgotPasswordAction;
use App\Containers\AppSection\Authentication\Actions\ResetPasswordAction;
use App\Containers\AppSection\Authentication\Actions\WebExtAdministratorLoginAction;
use App\Containers\AppSection\Authentication\Actions\WebExtLogoutAction;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\AppSection\Authentication\UI\WEB\Requests\ForgotPasswordRequest;
use App\Containers\AppSection\Authentication\UI\WEB\Requests\LoginRequest;
use App\Containers\AppSection\Authentication\UI\WEB\Requests\LogoutRequest;
use App\Containers\AppSection\Authentication\UI\WEB\Requests\ResetPasswordRequest;
use App\Containers\AppSection\User\Actions\UpdateUserAdminPasswordAction;
use App\Containers\AppSection\User\Actions\UpdateUsernameAdminPasswordAction;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\Profile\MyProfileRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\Profile\UpdatePasswordProfileRequest;
use App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\Profile\UpdateUsernameProfileRequest;
use App\Ship\Parents\Controllers\WebController;
use App\Ship\Parents\Exceptions\Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends WebController
{
    public function showLoginPage()
    {
        $page_title = "Ingreso";
        if (Auth::guard('external')->check()) {
            return redirect()->route('ext_admin_index');
        }
        return view('frontend@extAdministrator::authentication.login', [], compact('page_title'));
    }

    public function postLogin(LoginRequest $request): RedirectResponse
    {
        try {
            $result = app(WebExtAdministratorLoginAction::class)->run($request);
        } catch (Exception $e) {
            return redirect()->route('ext_admin_login')
                ->withInput(['email' => $request->email])->with('status', $e->getMessage());
        }
        return is_array($result) ? redirect()->route('ext_admin_login')
            ->with($result) : redirect()->route('ext_admin_index');
    }

    public function postLogout(LogoutRequest $request)
    {
        app(WebExtLogoutAction::class)->run();
        $request->session()->flush();
        return redirect()->route('ext_admin_login');
    }

    public function showForgotPasswordPage()
    {
        $page_title = "Olvidaste tu contraseña";
        if (Auth::guard('external')->check()) {
            return redirect()->route('ext_admin_index');
        }
        return view('frontend@extAdministrator::authentication.forgotPassword', [
            'reseturl' => url(route('ext_admin_reset_password'))
        ], compact('page_title'));
    }

    public function postForgotPassword(ForgotPasswordRequest $request): RedirectResponse
    {
        try {
            app(ForgotPasswordAction::class)->run($request);
            return redirect()->route('ext_admin_forgot_password')
                ->with('success', 'Se ha enviado un correo para restablecer su contraseña.');
        } catch (Exception $e) {
            return redirect()->route('ext_admin_forgot_password')
                ->with('error', $e->getMessage());
        }
    }

    public function showResetPasswordPage()
    {
        $page_title = "Restablecer contraseña";
        if (Auth::guard('external')->check()) {
            return redirect()->route('ext_admin_index');
        }
        return view('frontend@extAdministrator::authentication.resetPassword', [], compact('page_title'));
    }

    public function postResetPassword(ResetPasswordRequest $request): RedirectResponse
    {
        try {
            app(ResetPasswordAction::class)->run($request);
            return redirect()->route('ext_admin_reset_password')
                ->with(
                    'success',
                    'La contraseña ha sido restablecida con satisfactoriamente. Intente ingresar nuevamente'
                );
        } catch (Exception $e) {
            return redirect()->route('ext_admin_reset_password')->with('error', $e->getMessage());
        }
    }

    public function showMyProfile(MyProfileRequest $request)
    {
        $page_title = "Mi Perfil";
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('external');
        return view('frontend@extAdministrator::authentication.myProfile', [
            'user' => $user
        ], compact('page_title'));
    }

    public function updatePasswordProfile(UpdatePasswordProfileRequest $request)
    {
        try {
            $user = app(GetAuthenticatedUserByGuardTask::class)->run('external');
            $user = app(UpdateUserAdminPasswordAction::class)->run($request);
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function updateUsernameProfile(UpdateUsernameProfileRequest $request)
    {
        try {
            $user = app(GetAuthenticatedUserByGuardTask::class)->run('external');
            $user = app(UpdateUsernameAdminPasswordAction::class)->run($request);
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
