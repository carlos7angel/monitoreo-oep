<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\CreateUserTask;
use App\Containers\AppSection\User\Tasks\FindUserByEmailTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\EmailAlreadyExistsException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
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
        $sanitizedData = $request->sanitizeInput([
            // add your request data hereh
        ]);

        $existing_user = app(FindUserByEmailTask::class)->run($request->user_email);
        if ($existing_user) {
            throw new EmailAlreadyExistsException('El correo electrónico ya existe, intente con otro.');
        }

        $data = [
            'email' => $request->user_email,
            'name' => $request->user_name,
            'password' => $request->user_password, //Hash::make($request->user_name)
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

        return DB::transaction(function () use ($data, $adminRole) {

            $user = $this->createUserTask->run($data);
            $user->assignRole($adminRole);
            $user->email_verified_at = now();
            $user->save();

            return $user;
        });
    }
}
