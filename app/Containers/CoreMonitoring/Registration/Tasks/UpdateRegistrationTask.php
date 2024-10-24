<?php

namespace App\Containers\CoreMonitoring\Registration\Tasks;

use App\Containers\CoreMonitoring\Registration\Data\Repositories\RegistrationRepository;
use App\Containers\CoreMonitoring\Registration\Models\Registration;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateRegistrationTask extends ParentTask
{
    public function __construct(
        protected readonly RegistrationRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Registration
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
