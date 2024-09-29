<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Containers\CoreMonitoring\UserProfile\Tasks\UpdateUserMediaProfileTask;
use App\Containers\CoreMonitoring\UserProfile\UI\WEB\Requests\UpdateUserProfileRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateUserProfileAction extends ParentAction
{
    public function __construct(
        private UpdateUserProfileTask $updateUserProfileTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateUserProfileRequest $request): MediaProfile
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateUserProfileTask->run($data, $request->id);
    }
}
