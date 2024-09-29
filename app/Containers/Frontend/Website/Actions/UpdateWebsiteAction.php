<?php

namespace App\Containers\Frontend\Website\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\Frontend\Website\Models\Website;
use App\Containers\Frontend\Website\Tasks\UpdateWebsiteTask;
use App\Containers\Frontend\Website\UI\WEB\Requests\UpdateWebsiteRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateWebsiteAction extends ParentAction
{
    public function __construct(
        private readonly UpdateWebsiteTask $updateWebsiteTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateWebsiteRequest $request): Website
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateWebsiteTask->run($data, $request->id);
    }
}
