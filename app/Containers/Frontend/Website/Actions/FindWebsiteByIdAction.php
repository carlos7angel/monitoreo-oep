<?php

namespace App\Containers\Frontend\Website\Actions;

use App\Containers\Frontend\Website\Models\Website;
use App\Containers\Frontend\Website\Tasks\FindWebsiteByIdTask;
use App\Containers\Frontend\Website\UI\WEB\Requests\ShowElectionPageRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindWebsiteByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindWebsiteByIdTask $findWebsiteByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(ShowElectionPageRequest $request): Website
    {
        return $this->findWebsiteByIdTask->run($request->id);
    }
}
