<?php

namespace App\Containers\CoreMonitoring\FileManager\Tasks;

use App\Containers\CoreMonitoring\FileManager\Data\Repositories\FileRepository;
use App\Containers\CoreMonitoring\FileManager\Models\File;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class StoreFileTask extends ParentTask
{
    public function __construct(
        protected FileRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data): File
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
