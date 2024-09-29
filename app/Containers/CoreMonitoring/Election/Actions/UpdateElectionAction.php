<?php

namespace App\Containers\CoreMonitoring\Election\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Containers\CoreMonitoring\Election\Tasks\UpdateElectionTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateFileTask;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateLogoImageElectionTask;
use App\Ship\Parents\Requests\Request;

class UpdateElectionAction extends ParentAction
{
    public function __construct(
        private UpdateElectionTask $updateElectionTask,
        private CreateFileTask $createFileTask,
        private FindElectionByIdTask $findElectionByIdTask,
        private CreateLogoImageElectionTask $createLogoImageElectionTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): Election
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $election = $this->findElectionByIdTask->run($request->id);

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $data = [
            'name' => $request->get('election_name'),
            'description' => $request->get('election_description'),
            'code' => $request->get('election_code'),
            'election_date' => $request->get('election_date'),
            'type' => $request->get('election_type'),
        ];

        if($request->has('election_enable_registration_media')) {
            $data['enable_for_media_registration'] = true;
            $data['start_date_media_registration'] = $request->get('election_start_date_registration_media');
            $data['end_date_media_registration'] = $request->get('election_end_date_registration_media');
            $data['due_days_observed_media_registration'] = (int) $request->get('election_due_days_observed');
            // $data['fid_form_media_registration'] = $request->get('election_subform_registration_media');
            if($request->file('election_affidavit_file_registration_media')) {
                $file_bases = $this->createFileTask->run($request->file('election_affidavit_file_registration_media'), 'election', $election->id, $user);
                $data['file_affidavit_media_registration'] = $file_bases->unique_code;
                // TODO: set status to ARCHIVED the old one
            }
        } else {
            $data['enable_for_media_registration'] = false;
            $data['start_date_media_registration'] = null;
            $data['end_date_media_registration'] = null;
            $data['fid_form_media_registration'] = null;
            $data['due_days_observed_media_registration'] = null;
            $data['file_affidavit_media_registration'] = null;
            // TODO: set status to ARCHIVED the old one
        }

        if($request->has('election_enable_monitoring')) {
            $data['enable_for_monitoring'] = true;
            $data['enable_monitoring_television_media'] = $request->has('election_monitoring_media_television');
            $data['enable_monitoring_radio_media'] = $request->has('election_monitoring_media_radio');
            $data['enable_monitoring_digital_media'] = $request->has('election_monitoring_media_digital');
            $data['enable_monitoring_print_media'] = $request->has('election_monitoring_media_print');
            $data['enable_monitoring_social_media'] = $request->has('election_monitoring_media_social');
        } else {
            $data['enable_for_monitoring'] = false;
            $data['enable_monitoring_television_media'] = false;
            $data['enable_monitoring_radio_media'] = false;
            $data['enable_monitoring_digital_media'] = false;
            $data['enable_monitoring_print_media'] = false;
            $data['enable_monitoring_social_media'] = false;
        }

        if($request->file('election_logo')) {
            $data['logo_image'] = $this->createLogoImageElectionTask->run($request->file('election_logo'), $election->id);
        }

        return $this->updateElectionTask->run($data, $election->id);
    }
}
