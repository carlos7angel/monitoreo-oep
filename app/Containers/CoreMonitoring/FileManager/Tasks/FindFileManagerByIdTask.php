<?php

namespace App\Containers\CoreMonitoring\FileManager\Tasks;

use App\Containers\CoreMonitoring\FileManager\Data\Repositories\FileRepository;
use App\Containers\CoreMonitoring\FileManager\Models\File;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindFileManagerByIdTask extends ParentTask
{
    public function __construct(
        protected readonly FileManagerRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): File
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
