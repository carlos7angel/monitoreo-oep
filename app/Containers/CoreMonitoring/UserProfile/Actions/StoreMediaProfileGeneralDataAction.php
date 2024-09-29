<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateLogoImageMediaTask;
use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Containers\CoreMonitoring\UserProfile\Tasks\UpdateUserMediaProfileTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class StoreMediaProfileGeneralDataAction extends ParentAction
{
    public function __construct(
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
            'media_name',
            'media_business_name',
            'media_nit',
            'media_rep_full_name',
            'media_rep_document',
            'media_rep_exp',
            'media_description',
        ]);

        $data = [
            'name' => $sanitizedData['media_name'],
            'business_name' => $sanitizedData['media_business_name'],
            'nit' => $sanitizedData['media_nit'],
            'rep_full_name' => $sanitizedData['media_rep_full_name'],
            'rep_document' => $sanitizedData['media_rep_document'],
            'rep_exp' => $sanitizedData['media_rep_exp'],
            'description' => $sanitizedData['media_description'],
        ];

        if($request->file('media_logo')) {
            $data['logo'] = $this->createLogoImageMediaTask->run($request->file('media_logo'), $sanitizedData['media_name']);
        }

        return $this->updateUserMediaProfileTask->run($data, $user->profile_data->id);
    }
}
