<?php

namespace App\Containers\Frontend\Website\Tasks;

use App\Containers\Frontend\Website\Data\Repositories\WebsiteRepository;
use App\Containers\Frontend\Website\Models\Website;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindWebsiteByIdTask extends ParentTask
{
    public function __construct(
        protected readonly WebsiteRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Website
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
