<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class GetAuthenticatedUserByGuardTask extends ParentTask
{
    public function run($guard): Authenticatable|User
    {
        $result = Auth::guard($guard)->user();

        if (null === $result) {
            throw new \RuntimeException('You are not authenticated.');
        }

        return $result;
    }
}
