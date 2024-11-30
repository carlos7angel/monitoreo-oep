<?php

namespace App\Containers\AppSection\Authentication\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Classes\LoginFieldProcessor;
use App\Containers\AppSection\Authentication\Exceptions\LoginFailedException;
use App\Containers\AppSection\Authentication\Values\IncomingLoginField;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class WebExtAdministratorLoginAction extends ParentAction
{
    public function run(Request $request)
    {
        $sanitizedData = $request->sanitizeInput([
            'email',
            'password',
            'remember' => true,
        ]);
        $loginFields = LoginFieldProcessor::extractAll($sanitizedData);

        $credentials = [];
        foreach ($loginFields as $loginField) {
            if (config('appSection-authentication.login.case_sensitive')) {
                $credentials[$loginField->name] =
                    static fn (Builder $query): Builder => $query->orWhere($loginField->name, $loginField->value);
            } else {
                $credentials[$loginField->name] =
                    static fn (Builder $query): Builder => $query->orWhereRaw("lower({$loginField->name}) = lower(?)", [$loginField->value]);
            }
        }

        $credentials['password'] = $sanitizedData['password'];
        $loggedIn = Auth::guard('external')->attempt($credentials, $sanitizedData['remember']);

        if (! $loggedIn) {
            $errorResult = array_reduce(
                $loginFields,
                static fn (array $result, IncomingLoginField $loginField): array => [
                    'errors' => array_merge($result['errors'], [$loginField->name => __('auth.failed')]),
                    'fields' => array_merge($result['fields'], [$loginField->name]),
                ],
                ['errors' => [], 'fields' => []],
            );

            throw new LoginFailedException('Las credenciales son incorrectas.');
        }

        $user = Auth::guard('external')->user();

        if (! $user->hasExternalAdminMediaRole()) {
            Auth::guard('external')->logout();
            throw new LoginFailedException('El usuario no tiene un rol autorizado');
        }

        if (! $user->active) {
            Auth::guard('external')->logout();
            throw new LoginFailedException('El usuario no esta activo. Póngase en contacto con soporte.');
        }

        session()->regenerate();

        return $user;

        //        if ($loggedIn) {
        //            return redirect()->intended();
        //        } else {
        //            return back()->withErrors(
        //                $errorResult['errors'],
        //            )->onlyInput(...$errorResult['fields']);
        //        }

    }
}
