<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateFileTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateLogoImageMediaTask;
use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Containers\CoreMonitoring\UserProfile\Tasks\UpdateUserMediaProfileTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class StoreMediaProfileFileDataAction extends ParentAction
{
    public function __construct(
        private CreateFileTask $createFileTask,
         private UpdateUserMediaProfileTask $updateUserMediaProfileTask,
         private CreateLogoImageMediaTask $createLogoImageMediaTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): MediaProfile
    {
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('external');

        $sanitizedData = $request->sanitizeInput([

        ]);

        $data = [];

        if($request->file('media_file_power_attorney')) {
            $file_bases = $this->createFileTask->run($request->file('media_file_power_attorney'), 'profile-media', $user->profile_data->id, $user);
            $data['file_power_attorney'] = $file_bases->unique_code;
            // TODO: set status to ARCHIVED the old one
        }

        if($request->file('media_file_rep_document')) {
            $file_bases = $this->createFileTask->run($request->file('media_file_rep_document'), 'profile-media', $user->profile_data->id, $user);
            $data['file_rep_document'] = $file_bases->unique_code;
            // TODO: set status to ARCHIVED the old one
        }

        if($request->file('media_file_nit')) {
            $file_bases = $this->createFileTask->run($request->file('media_file_nit'), 'profile-media', $user->profile_data->id, $user);
            $data['file_nit'] = $file_bases->unique_code;
            // TODO: set status to ARCHIVED the old one
        }

        return $this->updateUserMediaProfileTask->run($data, $user->profile_data->id);
    }
}
