<?php

namespace App\Containers\CoreMonitoring\Accreditation\Tasks;

use App\Containers\CoreMonitoring\Accreditation\Data\Repositories\AccreditationRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteAccreditationTask extends ParentTask
{
    public function __construct(
        protected readonly AccreditationRepository $repository,
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
