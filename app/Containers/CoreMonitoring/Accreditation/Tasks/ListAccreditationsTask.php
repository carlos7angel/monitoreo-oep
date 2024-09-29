<?php

namespace App\Containers\CoreMonitoring\Accreditation\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Accreditation\Data\Repositories\AccreditationRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListAccreditationsTask extends ParentTask
{
    public function __construct(
        protected readonly AccreditationRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->repository->addRequestCriteria()->paginate();
    }
}
