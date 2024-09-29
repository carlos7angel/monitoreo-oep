<?php

namespace App\Containers\Frontend\Website\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\Frontend\Website\Models\Website;
use App\Containers\Frontend\Website\Tasks\CreateWebsiteTask;
use App\Containers\Frontend\Website\UI\WEB\Requests\CreateWebsiteRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateWebsiteAction extends ParentAction
{
    public function __construct(
        private readonly CreateWebsiteTask $createWebsiteTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateWebsiteRequest $request): Website
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createWebsiteTask->run($data);
    }
}
