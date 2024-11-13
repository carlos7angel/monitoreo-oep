<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetUsersByRolesScopeTask extends ParentTask
{
    public function __construct(
        private UserRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(array $_roles, $_scope_type = null, $_scope_department = null): mixed
    {
        $users = $this->repository->whereHas('roles', function ($query) use ($_roles) {
            $query->whereIn('name', $_roles);
        });

        if ($_scope_type !== null && $_scope_department !== null) {
            $users = $users->findWhere([
                'type' => $_scope_type,
                'department' => $_scope_department
            ]);
        }

        return $users->all();
    }
}
