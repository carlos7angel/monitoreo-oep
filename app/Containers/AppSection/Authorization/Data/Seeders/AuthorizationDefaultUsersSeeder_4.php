<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\User\Actions\CreateAdminAction;
use App\Containers\AppSection\User\Tasks\CreateUserTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class AuthorizationDefaultUsersSeeder_4 extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     * @throws \Throwable
     */
    public function run(CreateUserTask $task): void
    {
        $super_user = $task->run(['email' => 'superadmin@oep.com', 'password' => 'admin.123', 'name' => 'OEP Super Admin']);
        $super_user->assignRole(app(FindRoleTask::class)->run('super', 'web'));
        $super_user->email_verified_at = now();
        $super_user->save();
    }
}
