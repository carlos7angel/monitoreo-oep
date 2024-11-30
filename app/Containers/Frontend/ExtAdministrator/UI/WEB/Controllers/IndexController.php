<?php

namespace App\Containers\Frontend\ExtAdministrator\UI\WEB\Controllers;

use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\IndexRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\WebController;

class IndexController extends WebController
{
    public function index(IndexRequest $request)
    {
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('external');
        if ($user->roles->first()->name === 'user_media') {
            return redirect()->route('ext_admin_media_profile_general_data_show');
        }
        if ($user->roles->first()->name === 'user_political') {
            return redirect()->route('ext_admin_registration_elections_list');
        }

        throw new NotFoundException();
    }
}
