<?php

namespace App\Containers\CoreMonitoring\Accreditation\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
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
        $sanitizedData = $request->sanitizeInput([
            // add your request data here
        ]);

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $accreditation = app(FindAccreditationByIdTask::class)->run($request->id);

//        if($accreditation->status !== 'observed') {
//            throw new NotFoundException('No se puede enviar el proceso de acreditación');
//        }

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

        $data['status_activity'] = app(UpdateStatusActivityAccreditationTask::class)->run(
            $accreditation->status_activity,
            $request->accreditation_status,
            $request->accreditation_observations,
            $user->id
        );

        $accreditation = $this->updateAccreditationTask->run($data, $accreditation->id);

        return $accreditation;
    }
}
