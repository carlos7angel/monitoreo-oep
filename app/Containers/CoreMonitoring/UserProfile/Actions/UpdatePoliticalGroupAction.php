<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateLogoImagePoliticalGroupTask;
use App\Containers\CoreMonitoring\UserProfile\Models\PoliticalGroupProfile;
use App\Containers\CoreMonitoring\UserProfile\Tasks\FindUserPoliticalGroupProfileByIdTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\UpdateUserPoliticalGroupProfileTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

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

        $sanitizedData = $request->sanitizeInput([

        ]);

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

        if ($request->has('pp_email')) {
            $data['email'] = $request->get('pp_email');
        }


        if($request->file('pp_logo')) {
            $data['logo'] = $this->createLogoImagePoliticalGroupTask->run($request->file('pp_logo'), $data['initials']);
        }

        return $this->updateUserPoliticalGroupProfileTask->run($data, $pp->id);
    }
}
