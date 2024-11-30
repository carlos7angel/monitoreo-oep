<?php

namespace App\Containers\CoreMonitoring\UserProfile\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateLogoImageMediaTask;
use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Containers\CoreMonitoring\UserProfile\Tasks\CreateTypeMediaProfileTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\RemoveAllMediaTypesByUserMediaProfileTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\UpdateUserMediaProfileTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\DB;

class StoreMediaProfileCategoryDataAction extends ParentAction
{
    public function __construct(
        private UpdateUserMediaProfileTask $updateUserMediaProfileTask,
        private RemoveAllMediaTypesByUserMediaProfileTask $removeAllMediaTypesByUserMediaProfileTask,
        private CreateLogoImageMediaTask $createLogoImageMediaTask,
        private CreateTypeMediaProfileTask $createTypeMediaProfileTask,
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
        $sanitizedData = $request->sanitizeInput($request->all());

        $dataProfile = [
            'media_type_television' => $request->has('media_type_television'),
            'media_type_radio' => $request->has('media_type_radio'),
            'media_type_print' => $request->has('media_type_print'),
            'media_type_digital' => $request->has('media_type_digital'),
        ];

        return DB::transaction(function () use ($dataProfile, $user, $request) {

            // DELETE ALL RECORDS (MEDIA_TYPES)
            $this->removeAllMediaTypesByUserMediaProfileTask->run($user->profile_data->id);

            // REORRER ARRAY Y GUARDAR CADA REGISTRO, CONTRASTANDO CON LOS CHECKBOX
            foreach ($request->media_type_list as $type) {
                if ($request->has($type['identifier'])) {

                    $db_type = '';
                    switch ($type['identifier']) {
                        case 'media_type_television':
                            $db_type = 'Televisivo';
                            break;
                        case 'media_type_radio':
                            $db_type = 'Radial';
                            break;
                        case 'media_type_print':
                            $db_type = 'Impreso';
                            break;
                        case 'media_type_digital':
                            $db_type = 'Digital';
                            break;
                    }

                    $data = [
                        'fid_media_profile' => $user->profile_data->id,
                        'type' => $db_type,
                        'coverage' => $type['coverage'],
                        'scope' => $type['scope'],
                        'scope_department' => $type['departments'],
                        'scope_area' => $type['area'],
                    ];

                    $this->createTypeMediaProfileTask->run($data);
                }
            }

            return $this->updateUserMediaProfileTask->run($dataProfile, $user->profile_data->id);

        });
    }
}
