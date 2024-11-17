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
use Illuminate\Support\Facades\DB;

class StoreMediaProfileContactDataAction extends ParentAction
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
            'media_legal_address',
            'media_contact_full_name',
            'media_cellphone',
            'media_website',
            'kt_media_profile_add_rrss_options',
        ]);

        $data = [
            'legal_address' => $sanitizedData['media_legal_address'],
            'contact_full_name' => $sanitizedData['media_contact_full_name'],
            'cellphone' => $sanitizedData['media_cellphone'],
            'website' => $sanitizedData['media_website'],
        ];

        if($request->has('kt_media_profile_add_rrss_options')) {
            $data['rrss'] = null;
            $rrss = [];
            $rrss_array =  $sanitizedData['kt_media_profile_add_rrss_options'];
            foreach ($rrss_array as $key => $rrss_item) {
                if(! empty($rrss_item['media_rrss_value']) && ! empty($rrss_item['media_rrss_option'])) {
                    $rrss[] = (object) array(
                        'rrss_option' => $rrss_item['media_rrss_option'],
                        'rrss_value' => $rrss_item['media_rrss_value'],
                    );
                }
            }
            if (count($rrss) > 0) {
                $data['rrss'] = json_encode($rrss);
            }
        }
        return DB::transaction(function () use ($data, $user, $request) {

            return $this->updateUserMediaProfileTask->run($data, $user->profile_data->id);

        });
    }
}
