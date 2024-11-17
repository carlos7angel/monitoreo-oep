<?php

namespace App\Containers\CoreMonitoring\Registration\Actions;

use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Containers\CoreMonitoring\Registration\Models\Registration;
use App\Containers\CoreMonitoring\Registration\Tasks\CreateRegistrationTask;
use App\Containers\CoreMonitoring\Registration\Tasks\FindRegistrationByElectionAndProfileTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\FindUserPoliticalGroupProfileByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class RegisterPoliticalGroupProfileElectionAction extends ParentAction
{
    public function __construct(
        private CreateRegistrationTask $createRegistrationTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(Request $request): Registration
    {
        $sanitizedData = $request->sanitizeInput($request->all());

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');
        $pp = app(FindUserPoliticalGroupProfileByIdTask::class)->run($request->id);
        $election = app(FindElectionByIdTask::class)->run($request->election_id);

        $registered = app(FindRegistrationByElectionAndProfileTask::class)->run($election->id, $pp->id, $pp->user->id);
        if (count($registered) > 0) {
            throw new NotFoundException('El Proceso Electoral ya esta registrado para el Partido Político');
        }

        return DB::transaction(function () use ($election, $request, $user, $pp) {
            $data = [
                'fid_election' => $election->id,
                'fid_political_group_profile' => $pp->id,
                'fid_user' => $pp->user->id,
                'registered_at' => Carbon::now(),
                'registered_by' => $user->id
            ];

            $registration = $this->createRegistrationTask->run($data);

            // Add Log
            App::make(Dispatcher::class)->dispatch(New AddActivityLogEvent(LogConstants::REGISTERED_POLITICAL_GROUP, $request->server(), $registration));

            return $registration;
        });
    }
}
