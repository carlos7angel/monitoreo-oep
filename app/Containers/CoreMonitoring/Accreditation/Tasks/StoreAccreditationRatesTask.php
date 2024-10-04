<?php

namespace App\Containers\CoreMonitoring\Accreditation\Tasks;

use App\Containers\AppSection\User\Models\User;
use App\Containers\CoreMonitoring\Accreditation\Data\Repositories\AccreditationRepository;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateFileTask;
use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;

class StoreAccreditationRatesTask extends ParentTask
{
    public function __construct(
        private CreateFileTask $createFileTask,
        protected AccreditationRepository $repository,
    ) {
    }


    public function run(Request $request, User $user, $accreditation_id)
    {
        $profile = $user->profile_data;

        /**
         * TELEVISION
         */
        if ($profile->media_type_television) {
            $item_type_television = $profile->mediaTypes->where('type', 'Televisivo')->first();
            if ($item_type_television) {

                // Nacional
                if($item_type_television->scope === 'Nacional') {
                    if(isset($request->file('media_television_file_rate')['Nacional'])) {
                        $file = $request->file('media_television_file_rate')['Nacional'];
                        $file_rate = $this->createFileTask->run($file, 'accreditation', $accreditation_id, $user);
                        $data['file_rate'] = $file_rate->unique_code;
                        $data['fid_accreditation'] = $accreditation_id;
                        $data['type'] = 'Televisivo';
                        $data['scope'] = 'Nacional';
                        app(CreateAccreditationRateTask::class)->run($data);
                    }
                }

                // Departamentos
                $states = explode(', ', $item_type_television->scope_department);
                foreach ($states as $state) {
                    if(isset($request->file('media_television_file_rate')[$state])) {
                        $file = $request->file('media_television_file_rate')[$state];
                        $file_rate = $this->createFileTask->run($file, 'accreditation', $accreditation_id, $user);
                        $data['file_rate'] = $file_rate->unique_code;
                        $data['fid_accreditation'] = $accreditation_id;
                        $data['type'] = 'Televisivo';
                        $data['scope'] = $state;
                        app(CreateAccreditationRateTask::class)->run($data);
                    }
                }
            }
        }

        /**
         * RADIO
         */
        if ($profile->media_type_radio) {
            $item_type_radio = $profile->mediaTypes->where('type', 'Radial')->first();
            if ($item_type_radio) {

                // Nacional
                if($item_type_radio->scope === 'Nacional') {
                    $file = $request->file('media_radio_file_rate')['Nacional'];
                    if($file) {
                        $file_rate = $this->createFileTask->run($file, 'accreditation', $accreditation_id, $user);
                        $data['file_rate'] = $file_rate->unique_code;
                        $data['fid_accreditation'] = $accreditation_id;
                        $data['type'] = 'Radial';
                        $data['scope'] = 'Nacional';
                        app(CreateAccreditationRateTask::class)->run($data);
                    }
                }

                // Departamentos
                $states = explode(', ', $item_type_radio->scope_department);
                foreach ($states as $state) {
                    $file = $request->file('media_radio_file_rate')[$state];
                    if($file) {
                        $file_rate = $this->createFileTask->run($file, 'accreditation', $accreditation_id, $user);
                        $data['file_rate'] = $file_rate->unique_code;
                        $data['fid_accreditation'] = $accreditation_id;
                        $data['type'] = 'Radial';
                        $data['scope'] = $state;
                        app(CreateAccreditationRateTask::class)->run($data);
                    }
                }

            }
        }
    }
}
