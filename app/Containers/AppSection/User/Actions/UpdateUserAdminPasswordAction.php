<?php

namespace App\Containers\AppSection\User\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\UpdateUserTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;

class UpdateUserAdminPasswordAction extends ParentAction
{
    public function __construct(
        private UpdateUserTask $updateUserTask,
    ) {
    }

    /**
     * @throws IncorrectIdException
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(Request $request): User
    {
        $sanitizedData = $request->sanitizeInput([
            'password',
        ]);

        $user = $this->updateUserTask->run($request->id, ['password' => $sanitizedData['password']]);

        // $user->notify(new PasswordUpdatedNotification());

        // Add Log
        App::make(Dispatcher::class)->dispatch(
            new AddActivityLogEvent(LogConstants::UPDATED_USER_DATA_PASSWORD, $request->server(), $user)
        );

        return $user;
    }
}
