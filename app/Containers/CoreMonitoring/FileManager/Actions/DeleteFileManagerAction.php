<?php

namespace App\Containers\CoreMonitoring\FileManager\Actions;

use App\Containers\CoreMonitoring\FileManager\Tasks\DeleteFileManagerTask;
use App\Containers\CoreMonitoring\FileManager\UI\WEB\Requests\DeleteFileManagerRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteFileManagerAction extends ParentAction
{
    public function __construct(
        private readonly DeleteFileManagerTask $deleteFileManagerTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteFileManagerRequest $request): int
    {
        return $this->deleteFileManagerTask->run($request->id);
    }
}
