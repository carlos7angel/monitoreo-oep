<?php

namespace App\Containers\CoreMonitoring\FileManager\Tasks;

use App\Containers\CoreMonitoring\FileManager\Data\Repositories\FileRepository;
use App\Containers\CoreMonitoring\FileManager\Models\File;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateFileManagerTask extends ParentTask
{
    public function __construct(
        protected readonly FileManagerRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): File
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
