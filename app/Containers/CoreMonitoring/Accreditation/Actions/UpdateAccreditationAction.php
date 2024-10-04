<?php

namespace App\Containers\CoreMonitoring\Accreditation\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Accreditation\Models\Accreditation;
use App\Containers\CoreMonitoring\Accreditation\Tasks\FindAccreditationByIdTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\GenerateAccreditationDataTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\StoreAccreditationRatesTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\UpdateAccreditationRatesTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\UpdateAccreditationTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\UpdateStatusActivityAccreditationTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateFileTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;

class UpdateAccreditationAction extends ParentAction
{
    public function __construct(
        private CreateFileTask $createFileTask,
        private UpdateAccreditationTask $updateAccreditationTask,
        private UpdateAccreditationRatesTask $updateAccreditationRatesTask,
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

        $data = [];

        if($request->file('media_file_request_letter')) {
            $file_request_letter = $this->createFileTask->run($request->file('media_file_request_letter'), 'accreditation', $accreditation->id, $user);
            $data['file_request_letter'] = $file_request_letter->unique_code;
        }

        if($request->file('media_file_affidavit')) {
            $file_affidavit = $this->createFileTask->run($request->file('media_file_affidavit'), 'accreditation', $accreditation->id, $user);
            $data['file_affidavit'] = $file_affidavit->unique_code;
        }


        $data['data'] = app(GenerateAccreditationDataTask::class)->run($user->profile_data);

        $data['status_activity'] = app(UpdateStatusActivityAccreditationTask::class)->run($accreditation->status_activity, $accreditation->status, '', $user->id);

        $this->updateAccreditationRatesTask->run($request, $user, $accreditation);

        $accreditation = $this->updateAccreditationTask->run($data, $accreditation->id);

        return $accreditation;
    }
}
