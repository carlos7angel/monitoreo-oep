<?php

namespace App\Containers\Frontend\Website\Tasks;

use App\Containers\Frontend\Website\Data\Repositories\WebsiteRepository;
use App\Containers\Frontend\Website\Models\Website;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateWebsiteTask extends ParentTask
{
    public function __construct(
        protected readonly WebsiteRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Website
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
