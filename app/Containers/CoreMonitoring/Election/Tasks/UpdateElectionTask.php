<?php

namespace App\Containers\CoreMonitoring\Election\Tasks;

use App\Containers\CoreMonitoring\Election\Data\Repositories\ElectionRepository;
use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateElectionTask extends ParentTask
{
    public function __construct(
        protected readonly ElectionRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Election
    {
        //        try {
        return $this->repository->update($data, $id);
        //        } catch (ModelNotFoundException) {
        //            throw new NotFoundException();
        //        } catch (\Exception) {
        //            throw new UpdateResourceFailedException();
        //        }
    }
}
