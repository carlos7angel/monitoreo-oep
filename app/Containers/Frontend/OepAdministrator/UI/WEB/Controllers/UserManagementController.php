<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers;

use App\Containers\AppSection\User\Actions\CreateAdminUserAction;
use App\Containers\AppSection\User\Actions\GetAllUsersJsonDataTableAction;
use App\Containers\AppSection\User\Actions\UpdateUserAdminPasswordAction;
use App\Containers\AppSection\User\Tasks\FindUserByIdTask;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\UserManagement\DetailUsersRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\UserManagement\GetAllUsersDataTableRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\UserManagement\ListUsersRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\UserManagement\StoreUserRequest;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\UserManagement\UpdatePasswordRequest;
use App\Ship\Parents\Controllers\WebController;
use Exception;

class UserManagementController extends WebController
{
    public function list(ListUsersRequest $request)
    {
        $page_title = "Usuarios";
        return view('frontend@oepAdministrator::userManagement.list', [], compact('page_title'));
    }

    public function listJsonDt(GetAllUsersDataTableRequest $request)
    {
        try {
            $data = app(GetAllUsersJsonDataTableAction::class)->run($request);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $user = app(CreateAdminUserAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => '']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function detail(DetailUsersRequest $request)
    {
        $page_title = "Usuario Administrador";
        $user = app(FindUserByIdTask::class)->run($request->id);
        return view('frontend@oepAdministrator::userManagement.detail', ['user' => $user], compact('page_title'));
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        try {
            $user = app(UpdateUserAdminPasswordAction::class)->run($request);
            return response()->json(['success' => true, 'redirect' => '']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

}
