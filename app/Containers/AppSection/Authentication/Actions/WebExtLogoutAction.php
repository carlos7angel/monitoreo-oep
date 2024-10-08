<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\Auth;

class WebExtLogoutAction extends ParentAction
{
    public function run(): void
    {
        Auth::guard('external')->logout();
    }
}
