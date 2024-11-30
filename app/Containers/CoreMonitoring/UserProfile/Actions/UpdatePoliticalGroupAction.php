<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateLogoImagePoliticalGroupTask;
use App\Containers\CoreMonitoring\UserProfile\Models\PoliticalGroupProfile;
use App\Containers\CoreMonitoring\UserProfile\Tasks\FindUserPoliticalGroupProfileByIdTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\UpdateUserPoliticalGroupProfileTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class UpdatePoliticalGroupAction extends ParentAction
{
    public function __construct(
        private CreateLogoImagePoliticalGroupTask $createLogoImagePoliticalGroupTask,
        private UpdateUserPoliticalGroupProfileTask $updateUserPoliticalGroupProfileTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): PoliticalGroupProfile
    {
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $sanitizedData = $request->sanitizeInput($request->all());

        $pp = app(FindUserPoliticalGroupProfileByIdTask::class)->run($request->id);

        $data = [
            'name' => $request->get('pp_name'),
            'initials' => $request->get('pp_initials'),
            'description' => $request->get('pp_description'),
            'foundation_date' => $request->get('pp_foundation_date') ? $request->get('pp_foundation_date') : null,
            'cellphone' => $request->get('pp_cellphone') ? $request->get('pp_cellphone') : null,
            'rep_full_name' => $request->get('pp_rep_full_name'),
            'rep_document' => $request->get('pp_rep_document'),
            'rep_exp' => $request->get('pp_rep_exp'),
        ];

        return DB::transaction(function () use ($data, $request, $pp) {
            if ($request->has('pp_email')) {
                $data['email'] = $request->get('pp_email');
            }

            if ($request->file('pp_logo')) {
                $data['logo'] = $this->createLogoImagePoliticalGroupTask
                    ->run($request->file('pp_logo'), $data['initials']);
            }

            $pp = $this->updateUserPoliticalGroupProfileTask->run($data, $pp->id);

            // Add Log
            App::make(Dispatcher::class)->dispatch(
                new AddActivityLogEvent(LogConstants::UPDATED_POLITICAL_GROUP, $request->server(), $pp)
            );

            return $pp;
        });
    }
}
