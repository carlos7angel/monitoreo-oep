<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\AppSection\User\Tasks\FindUserByEmailTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateLogoImagePoliticalGroupTask;
use App\Containers\CoreMonitoring\UserProfile\Models\PoliticalGroupProfile;
use App\Containers\CoreMonitoring\UserProfile\Tasks\CreateUserPoliticalGroupProfileTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\UpdateUserPoliticalGroupProfileTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;

class StorePoliticalGroupAction extends ParentAction
{
    public function __construct(
         private CreateUserPoliticalGroupProfileTask $createUserPoliticalGroupProfileTask,
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

//        $existing_email = app(FindUserByEmailTask::class)->run($request->get('pp_email'));
//        if ($existing_email) {
//            throw new NotFoundException('El correo electrónico ya existe, intente con otro.');
//        }

        $data = [
            'name' => $request->get('pp_name'),
            'initials' => $request->get('pp_initials'),
            'description' => $request->get('pp_description'),
            'foundation_date' => $request->get('pp_foundation_date') ? $request->get('pp_foundation_date') : null,
            'cellphone' => $request->get('pp_cellphone') ? $request->get('pp_cellphone') : null,

            'email' => $request->get('pp_email'),

            'rep_full_name' => $request->get('pp_rep_full_name'),
            'rep_document' => $request->get('pp_rep_document'),
            'rep_exp' => $request->get('pp_rep_exp'),

            'status' => 'ACTIVE',
            'registered_at' => Carbon::now()
        ];

        $pp = $this->createUserPoliticalGroupProfileTask->run($data);

        if($request->file('pp_logo')) {
            $dataU = [];
            $dataU['logo'] = $this->createLogoImagePoliticalGroupTask->run($request->file('pp_logo'), $pp->initials);
            $pp = $this->updateUserPoliticalGroupProfileTask->run($dataU, $pp->id);
        }

        return $pp;
    }
}
