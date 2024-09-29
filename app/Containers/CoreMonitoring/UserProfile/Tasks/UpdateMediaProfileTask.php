<?php

namespace App\Containers\CoreMonitoring\UserProfile\Tasks;

use App\Containers\CoreMonitoring\UserProfile\Data\Repositories\MediaProfileRepository;
use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateMediaProfileTask extends ParentTask
{
    public function __construct(
        protected MediaProfileRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): MediaProfile
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
