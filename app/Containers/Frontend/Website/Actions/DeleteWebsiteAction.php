<?php

namespace App\Containers\Frontend\Website\Actions;

use App\Containers\Frontend\Website\Tasks\DeleteWebsiteTask;
use App\Containers\Frontend\Website\UI\WEB\Requests\DeleteWebsiteRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteWebsiteAction extends ParentAction
{
    public function __construct(
        private readonly DeleteWebsiteTask $deleteWebsiteTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteWebsiteRequest $request): int
    {
        return $this->deleteWebsiteTask->run($request->id);
    }
}
