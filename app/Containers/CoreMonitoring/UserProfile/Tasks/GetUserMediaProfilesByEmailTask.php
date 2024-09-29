<?php

namespace App\Containers\CoreMonitoring\UserProfile\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\UserProfile\Data\Repositories\MediaProfileRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetUserMediaProfilesByEmailTask extends ParentTask
{
    public function __construct(
        protected readonly MediaProfileRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(string $_email): mixed
    {
        return $this->repository->findWhere(['email' => $_email]);
    }
}
