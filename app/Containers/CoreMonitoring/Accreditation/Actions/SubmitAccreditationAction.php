<?php

namespace App\Containers\CoreMonitoring\Accreditation\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Accreditation\Models\Accreditation;
use App\Containers\CoreMonitoring\Accreditation\Tasks\FindAccreditationByIdTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\GenerateAccreditationDataTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\UpdateAccreditationTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\UpdateStatusActivityAccreditationTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;

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
        $sanitizedData = $request->sanitizeInput([
            // add your request data here
        ]);

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('external');

        $accreditation = app(FindAccreditationByIdTask::class)->run($request->id);

        if($accreditation->status !== 'observed' && $accreditation->status !== 'draft') {
            throw new NotFoundException('No se puede enviar el proceso de acreditación');
        } else {
            // TODO: Check la fecha limite de la configuracion del proceso electoral

            if($accreditation->status === 'observed') {
                if($accreditation->due_date_observed) {
                    $due = Carbon::createFromFormat('d/m/Y H:i', $accreditation->due_date_observed);
                    $today = Carbon::now();
                    if (! $today->lte($due)) {
                        throw new NotFoundException('El plazo ha vencido');
                    }
                }
            }
        }

        $data = [
            'status' => 'new',
            'submitted_at' => Carbon::now()
        ];

        $data['status_activity'] = app(UpdateStatusActivityAccreditationTask::class)->run($accreditation->status_activity,'new', '', $user->id);

        $accreditation = $this->updateAccreditationTask->run($data, $accreditation->id);

        return $accreditation;
    }
}
