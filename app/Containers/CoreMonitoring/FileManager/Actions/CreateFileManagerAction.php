<?php

namespace App\Containers\CoreMonitoring\FileManager\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\CoreMonitoring\FileManager\Models\File;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateFileTask;
use App\Containers\CoreMonitoring\FileManager\UI\WEB\Requests\CreateFileManagerRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateFileManagerAction extends ParentAction
{
    public function __construct(
        private CreateFileManagerTask $createFileManagerTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateFileManagerRequest $request): File
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createFileManagerTask->run($data);
    }
}
