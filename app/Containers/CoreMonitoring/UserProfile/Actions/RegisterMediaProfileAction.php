<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
//use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Containers\AppSection\User\Tasks\GetUserByEmailTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\CreateUserMediaProfileTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\GetUserMediaProfilesByEmailTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\EmailAlreadyExistsException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Carbon;

class RegisterMediaProfileAction extends ParentAction
{
    public function __construct(
        private CreateUserMediaProfileTask $createUserMediaProfileTask,
        private GetUserByEmailTask $getUserByEmailTask,
        private GetUserMediaProfilesByEmailTask $getUserMediaProfilesByEmailTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request): mixed
    {
        $sanitizedData = $request->sanitizeInput([
            'media_name',
            'media_business_name',
            'media_nit',
            'media_type',
            'media_rep_name',
            'media_cellphone',
            'media_email',
        ]);

        $media_profiles = $this->getUserMediaProfilesByEmailTask->run($sanitizedData['media_email']);
        $exist_email = $this->getUserByEmailTask->run($sanitizedData['media_email']);
        if($media_profiles->count() > 0 || ! empty($exist_email)) {
            throw new EmailAlreadyExistsException();
        }

        $data = [
            'name' => $sanitizedData['media_name'],
            'business_name' => $sanitizedData['media_business_name'],
            'nit' => $sanitizedData['media_nit'],
            'type' => json_encode($sanitizedData['media_type']),
            'rep_full_name' => $sanitizedData['media_rep_name'],
            'cellphone' => $sanitizedData['media_cellphone'],
            'email' => $sanitizedData['media_email'],
            'registration_date' => Carbon::now(),
            'status' => 'created',
        ];

        return $this->createUserMediaProfileTask->run($data);
    }
}
