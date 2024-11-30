<?php

namespace App\Containers\CoreMonitoring\Election\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Containers\CoreMonitoring\Election\Tasks\CreateElectionTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateFileTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateLogoImageElectionTask;
use App\Containers\CoreMonitoring\Election\Tasks\UpdateElectionTask;
use App\Ship\Parents\Requests\Request;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class CreateElectionAction extends ParentAction
{
    public function __construct(
        private CreateElectionTask $createElectionTask,
        private UpdateElectionTask $updateElectionTask,
        private CreateFileTask $createFileTask,
        private CreateLogoImageElectionTask $createLogoImageElectionTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request): Election
    {

        $sanitizedData = $request->sanitizeInput([
            // add your request data here
        ]);

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $data = [
            'name' => $request->get('election_name'),
            'description' => $request->get('election_description'),
            'code' => $request->get('election_code'),
            'election_date' => $request->get('election_date'),
            'type' => $request->get('election_type'),
            'status' => 'draft',
        ];

        if ($request->has('election_enable_registration_media')) {
            $data['enable_for_media_registration'] = true;
            $data['start_date_media_registration'] = $request->get('election_start_date_registration_media');
            $data['end_date_media_registration'] = $request->get('election_end_date_registration_media');
            $data['due_days_observed_media_registration'] = (int) $request->get('election_due_days_observed');
            // $data['fid_form_media_registration'] = $request->get('election_subform_registration_media');
        }

        if ($request->has('election_enable_monitoring')) {
            $data['enable_for_monitoring'] = true;
            $data['fid_form_tv_media'] = $request->get('election_form_tv_media') ? $request->get('election_form_tv_media') : null;
            $data['fid_form_radio_media'] = $request->get('election_form_radio_media') ? $request->get('election_form_radio_media') : null;
            $data['fid_form_print_media'] = $request->get('election_form_print_media') ? $request->get('election_form_print_media') : null;
            $data['fid_form_digital_media'] = $request->get('election_form_digital_media') ? $request->get('election_form_digital_media') : null;
            $data['fid_form_rrss_media'] = $request->get('election_form_rrss_media') ? $request->get('election_form_rrss_media') : null;
        }

        if ($request->has('election_enable_political_registration')) {
            $data['enable_for_political_registration'] = true;
            $data['end_date_political_registration'] = $request->get('election_end_date_political_registration');
            $data['description_for_political_registration'] = $request->get('election_description_political_registration');
            $data['max_size_for_political_registration'] = (int) $request->get('election_max_size_political_registration');
            if ($request->has('election_mime_type_political_registration')) {
                $data['mime_types_for_political_registration'] = is_array($request->get('election_mime_type_political_registration')) ? json_encode($request->get('election_mime_type_political_registration')) : null;
            }
        }

        return DB::transaction(function () use ($data, $user, $request) {

            $election = $this->createElectionTask->run($data);

            if ($request->file('election_affidavit_file_registration_media') || $request->file('election_logo') || $request->file('election_banner')) {
                if ($request->has('election_enable_registration_media') && $request->file('election_affidavit_file_registration_media')) {
                    $file_bases = $this->createFileTask->run($request->file('election_affidavit_file_registration_media'), 'election', $election->id, $user);
                    $election->file_affidavit_media_registration = $file_bases->unique_code;
                }
                $election->logo_image = $this->createLogoImageElectionTask->run($request->file('election_logo'), $election->id);

                if ($request->file('election_banner')) {
                    $election->banner = $this->createLogoImageElectionTask->run($request->file('election_banner'), $election->id);
                }

                $election->save();
            }

            // Add Log
            App::make(Dispatcher::class)->dispatch(
                new AddActivityLogEvent(LogConstants::CREATED_ELECTION, $request->server(), $election)
            );

            return $election;
        });
    }
}
