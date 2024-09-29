<?php

namespace App\Containers\CoreMonitoring\FileManager\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\CoreMonitoring\FileManager\Models\File;
use App\Containers\CoreMonitoring\FileManager\Tasks\UpdateFileManagerTask;
use App\Containers\CoreMonitoring\FileManager\UI\WEB\Requests\UpdateFileManagerRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateFileManagerAction extends ParentAction
{
    public function __construct(
        private readonly UpdateFileManagerTask $updateFileManagerTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateFileManagerRequest $request): File
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateFileManagerTask->run($data, $request->id);
    }
}
