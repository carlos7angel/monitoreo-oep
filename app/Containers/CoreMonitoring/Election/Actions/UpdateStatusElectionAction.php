<?php

namespace App\Containers\CoreMonitoring\Election\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Containers\CoreMonitoring\Election\Tasks\UpdateElectionTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Ship\Parents\Requests\Request;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;

class UpdateStatusElectionAction extends ParentAction
{
    public function __construct(
        private UpdateElectionTask $updateElectionTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): Election
    {
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $election = app(FindElectionByIdTask::class)->run($request->id);

        $data = [
            'status' => $request->new_status,
        ];

        $election = $this->updateElectionTask->run($data, $election->id);

        // Add Log
        App::make(Dispatcher::class)->dispatch(
            new AddActivityLogEvent(LogConstants::UPDATED_STATUS_ELECTION, $request->server(), $election)
        );

        return  $election;
    }
}
