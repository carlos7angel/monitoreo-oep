<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\User\Tasks\CreateUserTask;
use App\Containers\AppSection\User\Tasks\FindUserByEmailTask;
use App\Containers\CoreMonitoring\UserProfile\Events\SendMediaAccountEnabledEvent;
use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Containers\CoreMonitoring\UserProfile\Tasks\FindUserMediaProfileByIdTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\UpdateMediaProfileTask;
use App\Ship\Exceptions\EmailAlreadyExistsException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;

class EnableUserMediaProfileAccountAction extends ParentAction
{
    public function __construct(

    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): MediaProfile
    {
        $sanitizedData = $request->sanitizeInput($request->all());

        $media_profile = app(FindUserMediaProfileByIdTask::class)->run($request->id);

        $password = strtoupper(substr(md5(
            Carbon::now()->timestamp . $media_profile->email . $media_profile->name . Str::random(24)
        ),0,10));
        // $password = 'admin';

        if (app(FindUserByEmailTask::class)->run($media_profile->email)) {
            throw new EmailAlreadyExistsException('El correo electrónico ya existe, intente con otro.');
        }

        $data = [
            'email' => $media_profile->email,
            'name' => $media_profile->name,
            'password' => Hash::make($password),
            'confirmed' => true,
            'active' => true,
            'profile_data_id' => $media_profile->id,
            'profile_data_type' => MediaProfile::class,
            'is_client' => true
        ];

        $user = app(CreateUserTask::class)->run($data);

        $user->assignRole(app(FindRoleTask::class)->run('user_media', 'external'));

        $media_profile = app(UpdateMediaProfileTask::class)->run([
            'status' => 'active',
            'fid_user' => $user->id,
            'credentials_sent' => true
        ], $media_profile->id);

        //Activity Log
        App::make(Dispatcher::class)->dispatch(New AddActivityLogEvent(LogConstants::ENABLED_USER_MEDIA_ACCOUNT, $request->server(), $user));

        //Send Mail::send(new SendMediaAccountEnabled($user, $media_profile, $password));
        App::make(Dispatcher::class)->dispatch(New SendMediaAccountEnabledEvent($user, $media_profile, $password));

        return $media_profile;
    }
}
