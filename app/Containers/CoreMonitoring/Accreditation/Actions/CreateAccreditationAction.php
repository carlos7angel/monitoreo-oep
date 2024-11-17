<?php

namespace App\Containers\CoreMonitoring\Accreditation\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Accreditation\Models\Accreditation;
use App\Containers\CoreMonitoring\Accreditation\Tasks\CreateAccreditationTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\GenerateAccreditationDataTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\StoreAccreditationRatesTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\UpdateAccreditationRatesTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\UpdateAccreditationTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\UpdateStatusActivityAccreditationTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateFileTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateAccreditationAction extends ParentAction
{
    public function __construct(
        private CreateFileTask $createFileTask,
        private CreateAccreditationTask $createAccreditationTask,
        private UpdateAccreditationTask $updateAccreditationTask,
        private StoreAccreditationRatesTask $storeAccreditationRatesTask,
        private UpdateAccreditationRatesTask $updateAccreditationRatesTask,
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
            'status' => 'draft',
        ];

        return DB::transaction(function () use ($data, $user, $request) {
            $accreditation = $this->createAccreditationTask->run($data);

            $data = [];
            if ($request->file('media_file_request_letter')) {
                $file_request_letter = $this->createFileTask->run($request->file('media_file_request_letter'), 'accreditation', $accreditation->id, $user);
                $data['file_request_letter'] = $file_request_letter->unique_code;
            }

            if ($request->file('media_file_affidavit')) {
                $file_affidavit = $this->createFileTask->run($request->file('media_file_affidavit'), 'accreditation', $accreditation->id, $user);
                $data['file_affidavit'] = $file_affidavit->unique_code;
            }

            $data['data'] = app(GenerateAccreditationDataTask::class)->run($user->profile_data);
            $data['code'] = 'D-' . strtoupper(substr(md5($accreditation->id . $accreditation->created_at . $accreditation->code), 0, 6)) . '-' . Carbon::now()->format('y');
            $data['status_activity'] = app(UpdateStatusActivityAccreditationTask::class)->run(null, 'draft', '', $user->id);

            $accreditation = $this->updateAccreditationTask->run($data, $accreditation->id);

            $this->updateAccreditationRatesTask->run($request, $user, $accreditation);

            // Add Log
            App::make(Dispatcher::class)->dispatch(New AddActivityLogEvent(LogConstants::CREATED_ACCREDITATION, $request->server(), $accreditation));

            return $accreditation;
        });
    }
}
