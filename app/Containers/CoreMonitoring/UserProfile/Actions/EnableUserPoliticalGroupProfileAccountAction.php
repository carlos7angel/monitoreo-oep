<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\User\Tasks\CreateUserTask;
use App\Containers\AppSection\User\Tasks\FindUserByEmailTask;
use App\Containers\CoreMonitoring\UserProfile\Events\SendMediaAccountEnabledEvent;
use App\Containers\CoreMonitoring\UserProfile\Models\PoliticalGroupProfile;
use App\Containers\CoreMonitoring\UserProfile\Tasks\FindUserPoliticalGroupProfileByIdTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\UpdateUserPoliticalGroupProfileTask;
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

class EnableUserPoliticalGroupProfileAccountAction extends ParentAction
{
    public function __construct(

    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): PoliticalGroupProfile
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $pp = app(FindUserPoliticalGroupProfileByIdTask::class)->run($request->id);

        $existing_email = app(FindUserByEmailTask::class)->run($pp->email);
        if ($existing_email) {
            throw new EmailAlreadyExistsException('El correo electrónico ya existe, intente con otro.');
        }

        // $password = Str::password(12, true, true, true, false);
        $password = 'admin'; // TODO: CREATE OEN INSTED HARCODED

        $data = [
            'email' => $pp->email,
            'name' => $pp->name,
            'password' => Hash::make($password),
            'confirmed' => 1,
            'active' => true,
            'profile_data_id' => $pp->id,
            'profile_data_type' => PoliticalGroupProfile::class,
        ];

        $user = app(CreateUserTask::class)->run($data);

        $user->assignRole(app(FindRoleTask::class)->run('user_political', 'external'));

        $pp = app(UpdateUserPoliticalGroupProfileTask::class)->run([
            'fid_user' => $user->id,
            'credentials_sent' => true
        ], $pp->id);

        // App::make(Dispatcher::class)->dispatch(New SendMediaAccountEnabledEvent($user, $media_profile, $password));

        return $pp;
    }
}
