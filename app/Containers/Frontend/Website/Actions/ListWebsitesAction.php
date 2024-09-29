<?php

namespace App\Containers\Frontend\Website\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Frontend\Website\Tasks\ListWebsitesTask;
use App\Containers\Frontend\Website\UI\WEB\Requests\ListWebsitesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListWebsitesAction extends ParentAction
{
    public function __construct(
        private readonly ListWebsitesTask $listWebsitesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListWebsitesRequest $request): mixed
    {
        return $this->listWebsitesTask->run();
    }
}
