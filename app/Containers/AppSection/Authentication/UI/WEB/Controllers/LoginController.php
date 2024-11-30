<?php

namespace App\Containers\AppSection\Authentication\UI\WEB\Controllers;

use App\Containers\AppSection\Authentication\Actions\WebLoginAction;
use App\Containers\AppSection\Authentication\UI\WEB\Requests\LoginRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\RedirectResponse;

class LoginController extends WebController
{
    //    public function __invoke(LoginRequest $request, WebLoginAction $action): RedirectResponse
    //    {
    //        dd($request->all());
    //
    //        return $action->run($request);
    //    }

    public function redirectLogin(LoginRequest $request)
    {
        dd($request->all());
    }

}
