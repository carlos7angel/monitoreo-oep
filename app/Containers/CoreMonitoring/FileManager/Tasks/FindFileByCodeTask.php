<?php

namespace App\Containers\CoreMonitoring\FileManager\Tasks;

use App\Containers\CoreMonitoring\FileManager\Data\Repositories\FileRepository;
use App\Containers\CoreMonitoring\FileManager\Models\File;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindFileByCodeTask extends ParentTask
{
    public function __construct(
        protected FileRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($code): File|null
    {
        try {
            return $this->repository->findByField('unique_code', $code)->first();
        } catch (\Exception) {
            return null;
        }
    }
}
