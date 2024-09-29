<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\User\Tasks\CreateUserTask;
use App\Containers\CoreMonitoring\UserProfile\Events\SendMediaAccountEnabledEvent;
use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Containers\CoreMonitoring\UserProfile\Tasks\FindUserMediaProfileByIdTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\UpdateMediaProfileTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\UpdateUserMediaProfileTask;
use App\Containers\CoreMonitoring\UserProfile\UI\WEB\Requests\UpdateUserProfileRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $media_profile = app(FindUserMediaProfileByIdTask::class)->run($request->id);

        // $password = Str::password(12, true, true, true, false);
        $password = 'admin';

        $data = [
            'email' => $media_profile->email,
            'name' => $media_profile->name,
            'password' => Hash::make($password),
            'confirmed' => 1,
            'active' => true,
            'profile_data_id' => $media_profile->id,
            'profile_data_type' => MediaProfile::class,
        ];

        $user = app(CreateUserTask::class)->run($data);

        $user->assignRole(app(FindRoleTask::class)->run('user_media', 'external'));

        $media_profile = app(UpdateMediaProfileTask::class)->run([
            'status' => 'active',
            'fid_user' => $user->id,
            'credentials_sent' => true
        ], $media_profile->id);

        // App::make(Dispatcher::class)->dispatch(New SendMediaAccountEnabledEvent($user, $media_profile, $password));

        return $media_profile;
    }
}
