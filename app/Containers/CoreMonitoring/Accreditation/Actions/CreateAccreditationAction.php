<?php

namespace App\Containers\CoreMonitoring\Accreditation\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Accreditation\Models\Accreditation;
use App\Containers\CoreMonitoring\Accreditation\Tasks\CreateAccreditationTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\GenerateAccreditationDataTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\UpdateAccreditationTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\UpdateStatusActivityAccreditationTask;
use App\Containers\CoreMonitoring\Accreditation\UI\WEB\Requests\CreateAccreditationRequest;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateFileTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CreateAccreditationAction extends ParentAction
{
    public function __construct(
        private CreateFileTask $createFileTask,
        private CreateAccreditationTask $createAccreditationTask,
        private UpdateAccreditationTask $updateAccreditationTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request): Accreditation
    {
        $sanitizedData = $request->sanitizeInput([
            // add your request data here
        ]);

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('external');

        $unique_code = md5(Carbon::now()->timestamp . $user->id .  $request->get('media_election') . Str::random(24));
        $data = [
            'code' => $unique_code,
            'fid_election' => (int) $request->get('media_election'),
            'fid_user' => $user->id,
            'fid_media_profile' => $user->profile_data->id,
            'status' => 'new',
            'submitted_at' => Carbon::now()->toDateTimeString()
        ];

        $accreditation = $this->createAccreditationTask->run($data);

        $data = [];
        if($request->file('media_file_request_letter')) {
            $file_request_letter = $this->createFileTask->run($request->file('media_file_request_letter'), 'accreditation', $accreditation->id, $user);
            $data['file_request_letter'] = $file_request_letter->unique_code;
        }

        if($request->file('media_file_affidavit')) {
            $file_affidavit = $this->createFileTask->run($request->file('media_file_affidavit'), 'accreditation', $accreditation->id, $user);
            $data['file_affidavit'] = $file_affidavit->unique_code;
        }

        if($request->file('media_file_pricing_list')) {
            $file_pricing_list = $this->createFileTask->run($request->file('media_file_pricing_list'), 'accreditation', $accreditation->id, $user);
            $data['file_pricing_list'] = $file_pricing_list->unique_code;
        }

        $data['data'] = app(GenerateAccreditationDataTask::class)->run($user->profile_data);
        $data['code'] = 'D-' . strtoupper(substr(md5($accreditation->id . $accreditation->created_at . $accreditation->code),0,6)) . '-' . Carbon::now()->format('y');
        $data['status_activity'] = app(UpdateStatusActivityAccreditationTask::class)->run(null,'new', '', $user->id);

        $accreditation = $this->updateAccreditationTask->run($data, $accreditation->id);


        return $accreditation;
    }
}
