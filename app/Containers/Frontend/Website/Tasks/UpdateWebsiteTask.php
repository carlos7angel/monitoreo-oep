<?php

namespace App\Containers\Frontend\Website\Tasks;

use App\Containers\Frontend\Website\Data\Repositories\WebsiteRepository;
use App\Containers\Frontend\Website\Models\Website;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateWebsiteTask extends ParentTask
{
    public function __construct(
        protected readonly WebsiteRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Website
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
