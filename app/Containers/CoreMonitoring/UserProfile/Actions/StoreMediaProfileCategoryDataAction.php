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

class StoreMediaProfileCategoryDataAction extends ParentAction
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
            'media_type',
            'media_coverage',
            'media_scope',
            'media_scope_states',
            'media_scope_state',
            'media_scope_municipality',
        ]);

        $data = [
            'type' => json_encode($sanitizedData['media_type']),
            'coverage' => $sanitizedData['media_coverage'],
            'scope' => $sanitizedData['media_scope'],
        ];

        if($data['scope'] === 'Nacional') {
            $data['scope_department'] = json_encode($sanitizedData['media_scope_states']);
            $data['scope_municipality'] = null;
        }

        if($data['scope'] === 'Departamental') {
            $data['scope_department'] = json_encode(array($sanitizedData['media_scope_state']));
            $data['scope_municipality'] = null;
        }

        if($data['scope'] === 'Municipal') {
            $data['scope_municipality'] = $sanitizedData['media_scope_municipality'];
            $data['scope_department'] = null;
        }

        return $this->updateUserMediaProfileTask->run($data, $user->profile_data->id);
    }
}
