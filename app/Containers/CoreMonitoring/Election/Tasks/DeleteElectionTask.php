<?php

namespace App\Containers\CoreMonitoring\Election\Tasks;

use App\Containers\CoreMonitoring\Election\Data\Repositories\ElectionRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteElectionTask extends ParentTask
{
    public function __construct(
        protected readonly ElectionRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            return $this->repository->delete($id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
