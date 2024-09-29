<?php

namespace App\Containers\CoreMonitoring\Election\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Containers\CoreMonitoring\Election\Tasks\UpdateElectionTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Ship\Parents\Requests\Request;

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
        $sanitizedData = $request->sanitizeInput([
            // add your request data here
        ]);

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $election = app(FindElectionByIdTask::class)->run($request->id);

//        if($election->status !== 'observed') {
//            throw new NotFoundException('No se puede enviar el proceso de acreditación');
//        }

        $data = [
            'status' => $request->new_status,
        ];

        return $this->updateElectionTask->run($data, $election->id);
    }
}
