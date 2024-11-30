<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
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
        $sanitizedData = $request->sanitizeInput($request->all());

        $pp = app(FindUserPoliticalGroupProfileByIdTask::class)->run($request->id);

        if (app(FindUserByEmailTask::class)->run($pp->email)) {
            throw new EmailAlreadyExistsException('El correo electrónico ya existe, intente con otro.');
        }

        $password = strtoupper(substr(hash("sha512",
            Carbon::now()->timestamp . $pp->email . $pp->name . Str::random(24)
        ), 0, 10));
        // $password = 'admin';

        $data = [
            'email' => $pp->email,
            'name' => $pp->name,
            'password' => Hash::make($password),
            'confirmed' => true,
            'active' => true,
            'profile_data_id' => $pp->id,
            'profile_data_type' => PoliticalGroupProfile::class,
            'is_client' => true
        ];

        $user = app(CreateUserTask::class)->run($data);

        $user->assignRole(app(FindRoleTask::class)->run('user_political', 'external'));

        $pp = app(UpdateUserPoliticalGroupProfileTask::class)->run([
            'status' => 'ACTIVE',
            'fid_user' => $user->id,
            'credentials_sent' => true
        ], $pp->id);

        //Activity Log
        App::make(Dispatcher::class)->dispatch(new AddActivityLogEvent(LogConstants::ENABLED_USER_POLITICAL_ACCOUNT, $request->server(), $user));

        //Send Notification
        App::make(Dispatcher::class)->dispatch(new SendMediaAccountEnabledEvent($user, $pp, $password));

        return $pp;
    }
}
