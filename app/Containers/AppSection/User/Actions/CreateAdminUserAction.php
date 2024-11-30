<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\CreateUserTask;
use App\Containers\AppSection\User\Tasks\FindUserByEmailTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\EmailAlreadyExistsException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserAction extends ParentAction
{
    public function __construct(
        private CreateUserTask $createUserTask,
        private FindRoleTask $findRoleTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws \Throwable
     * @throws NotFoundException
     */
    public function run(Request $request): User
    {
        $sanitizedData = $request->sanitizeInput($request->all());

        $existing_user = app(FindUserByEmailTask::class)->run($request->user_email);
        if ($existing_user) {
            throw new EmailAlreadyExistsException('El correo electrónico ya existe, intente con otro.');
        }

        $data = [
            'email' => $request->user_email,
            'name' => $request->user_name,
            'password' => $request->user_password,
            'confirmed' => 1,
            'active' => true,
        ];

        $adminRole = app(FindRoleTask::class)->run($request->user_role, 'web');

        if ($adminRole->name === 'plenary') {
            $data['type'] = 'TSE';
            $data['department'] = 'Nacional';
        }

        if ($adminRole->name === 'media' || $adminRole->name === 'monitor' || $adminRole->name === 'analyst' || $adminRole->name === 'secretariat') {
            $data['type'] = $request->user_type;
            $data['department'] = $request->user_type === 'TSE' ? 'Nacional' : $request->user_department;
        }

        return DB::transaction(function () use ($data, $adminRole, $request) {

            $user = $this->createUserTask->run($data);
            $user->assignRole($adminRole);
            $user->email_verified_at = now();
            $user->save();

            // Add Log
            App::make(Dispatcher::class)->dispatch(
                new AddActivityLogEvent(LogConstants::CREATED_USER, $request->server(), $user)
            );

            return $user;
        });
    }
}
