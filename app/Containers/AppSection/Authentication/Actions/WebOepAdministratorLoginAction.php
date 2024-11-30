<?php

namespace App\Containers\AppSection\Authentication\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\Authentication\Classes\LoginFieldProcessor;
use App\Containers\AppSection\Authentication\Exceptions\LoginFailedException;
use App\Containers\AppSection\Authentication\Values\IncomingLoginField;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class WebOepAdministratorLoginAction extends ParentAction
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
                    static fn (Builder $query): Builder =>
                    $query->orWhere($loginField->name, $loginField->value);
            } else {
                $credentials[$loginField->name] =
                    static fn (Builder $query): Builder =>
                    $query->orWhereRaw("lower({$loginField->name}) = lower(?)", [$loginField->value]);
            }
        }

        $credentials['password'] = $sanitizedData['password'];
        $loggedIn = Auth::guard('web')->attempt($credentials, $sanitizedData['remember']);

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

        $user = Auth::guard('web')->user();

        if (! $user->hasAdminMediaRole()) {
            Auth::guard('web')->logout();
            throw new LoginFailedException('El usuario no tiene un rol autorizado');
        }

        if (! $user->active) {
            Auth::guard('web')->logout();
            throw new LoginFailedException('El usuario no esta activo. Póngase en contacto con soporte.');
        }

        session()->regenerate();

        // Add Log
        App::make(Dispatcher::class)->dispatch(
            new AddActivityLogEvent(LogConstants::LOGIN_ADMIN, $request->server(), $user)
        );

        if (! $loggedIn) {
            Auth::guard('external')->logout();
            throw new LoginFailedException(implode(" | ", $errorResult['errors']));
        }

        return $user;
    }
}
