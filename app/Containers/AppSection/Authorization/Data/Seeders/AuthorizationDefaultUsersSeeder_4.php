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
        $oep_user = $task->run([
            'email' => 'admin@oep.com',
            'password' => 'admin',
            'name' => 'OEP Admin',
        ]);
        $oep_user->assignRole(app(FindRoleTask::class)->run('admin', 'web'));
        $oep_user->email_verified_at = now();
        $oep_user->save();

//        $ext_user = $task->run([
//            'email' => 'ext_media@oep.com',
//            'password' => 'admin',
//            'name' => 'EXT Media',
//        ]);
//        $ext_user->assignRole(app(FindRoleTask::class)->run('media', 'external'));
//        $ext_user->email_verified_at = now();
//        $ext_user->save();

    }
}
