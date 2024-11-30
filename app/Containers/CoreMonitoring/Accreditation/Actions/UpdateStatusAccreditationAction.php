<?php

namespace App\Containers\CoreMonitoring\Accreditation\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Accreditation\Models\Accreditation;
use App\Containers\CoreMonitoring\Accreditation\Tasks\FindAccreditationByIdTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\UpdateAccreditationTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\UpdateStatusActivityAccreditationTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class UpdateStatusAccreditationAction extends ParentAction
{
    public function __construct(
        private UpdateAccreditationTask $updateAccreditationTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): Accreditation
    {
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $accreditation = app(FindAccreditationByIdTask::class)->run($request->id);

        $data = [
            'status' => $request->accreditation_status,
            'observations' => $request->accreditation_observations,
            'updated_at' => Carbon::now()->toDateTimeString()
        ];

        if ($request->accreditation_status === 'observed') {
            $days = (int) $accreditation->election->due_days_observed_media_registration;
            if ($days > 0) {
                $data['due_date_observed'] = Carbon::now()->addDays($days)->endOfDay();
            }
        }

        if ($request->accreditation_status === 'accredited') {
            $data['accredited_by'] = $user->id;
        }

        return DB::transaction(function () use ($accreditation, $data, $user, $request) {

            $data['status_activity'] = app(UpdateStatusActivityAccreditationTask::class)->run(
                $accreditation->status_activity,
                $request->accreditation_status,
                $request->accreditation_observations,
                $user->id
            );

            $accreditation = $this->updateAccreditationTask->run($data, $accreditation->id);

            // Add Log
            App::make(Dispatcher::class)->dispatch(
                new AddActivityLogEvent(
                    LogConstants::STATUS_UPDATED_ACCREDITATION, $request->server(), $accreditation
                )
            );

            return $accreditation;
        });
    }
}
