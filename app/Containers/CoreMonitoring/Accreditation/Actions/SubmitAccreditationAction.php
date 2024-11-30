<?php

namespace App\Containers\CoreMonitoring\Accreditation\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Accreditation\Events\SubmitAccreditationNotificationEvent;
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

class SubmitAccreditationAction extends ParentAction
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
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('external');

        $accreditation = app(FindAccreditationByIdTask::class)->run($request->id);

        if ($accreditation->status !== 'observed' && $accreditation->status !== 'draft') {
            throw new NotFoundException('No se puede enviar el proceso de acreditación');
        } else {

            if ($accreditation->status === 'observed') {
                if ($accreditation->due_date_observed) {
                    $due = Carbon::createFromFormat('d/m/Y H:i', $accreditation->due_date_observed);
                    $today = Carbon::now();
                    if (! $today->lte($due)) {
                        throw new NotFoundException('El plazo ha vencido');
                    }
                }
            }
        }

        return DB::transaction(function () use ($accreditation, $user, $request) {
            $data = [
                'status' => 'new',
                'submitted_at' => Carbon::now()
            ];

            $data['status_activity'] = app(UpdateStatusActivityAccreditationTask::class)->run(
                $accreditation->status_activity,
                'new',
                '',
                $user->id
            );

            $accreditation = $this->updateAccreditationTask->run($data, $accreditation->id);

            // Add Log
            App::make(Dispatcher::class)->dispatch(
                new AddActivityLogEvent(LogConstants::SUBMITTED_ACCREDITATION, $request->server(), $accreditation)
            );

            // Send Notification
            App::make(Dispatcher::class)->dispatch(
                new SubmitAccreditationNotificationEvent($accreditation, $user)
            );

            return $accreditation;
        });
    }
}
