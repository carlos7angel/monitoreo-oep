<?php

namespace App\Containers\CoreMonitoring\Accreditation\Tasks;

use App\Containers\AppSection\User\Models\User;
use App\Containers\CoreMonitoring\Accreditation\Data\Repositories\AccreditationRepository;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateFileTask;
use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;

class UpdateAccreditationRatesTask extends ParentTask
{
    public function __construct(
        private CreateFileTask $createFileTask,
        protected AccreditationRepository $repository,
    ) {
    }


    public function run(Request $request, User $user, $accreditation)
    {
        $profile = $user->profile_data;

        $rates = $accreditation->rates;

        /**
         * TELEVISION
         */
        if ($profile->media_type_television) {
            $item_type_television = $profile->mediaTypes->where('type', 'Televisivo')->first();
            if ($item_type_television) {

                // Nacional
                if($item_type_television->scope === 'Nacional') {
                    $rate = $rates->where('type', 'Televisivo')->where('scope', 'Nacional')->first();
                    if(isset($request->file('media_television_file_rate')['Nacional'])) {
                        $file = $request->file('media_television_file_rate')['Nacional'];
                        $file_rate = $this->createFileTask->run($file, 'accreditation', $accreditation->id, $user);
                        $data['file_rate'] = $file_rate->unique_code;
                        $data['fid_accreditation'] = $accreditation->id;
                        $data['type'] = 'Televisivo';
                        $data['scope'] = 'Nacional';
                        if ($rate) {
                            app(UpdateAccreditationRateTask::class)->run(['file_rate' => $file_rate->unique_code], $rate->id);
                        } else {
                            app(CreateAccreditationRateTask::class)->run($data);
                        }
                    }
                }

                // Departamentos
                $states = explode(', ', $item_type_television->scope_department);
                foreach ($states as $state) {
                    $rate = $rates->where('type', 'Televisivo')->where('scope', $state)->first();
                    if(isset($request->file('media_television_file_rate')[$state])) {
                        $file = $request->file('media_television_file_rate')[$state];
                        $file_rate = $this->createFileTask->run($file, 'accreditation', $accreditation->id, $user);
                        $data['file_rate'] = $file_rate->unique_code;
                        $data['fid_accreditation'] = $accreditation->id;
                        $data['type'] = 'Televisivo';
                        $data['scope'] = $state;
                        if ($rate) {
                            app(UpdateAccreditationRateTask::class)->run(['file_rate' => $file_rate->unique_code], $rate->id);
                        } else {
                            app(CreateAccreditationRateTask::class)->run($data);
                        }
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
                    $rate = $rates->where('type', 'Radial')->where('scope', 'Nacional')->first();
                    if(isset($request->file('media_radio_file_rate')['Nacional'])) {
                        $file_rate = $this->createFileTask->run($request->file('media_radio_file_rate')['Nacional'], 'accreditation', $accreditation->id, $user);
                        $data['file_rate'] = $file_rate->unique_code;
                        $data['fid_accreditation'] = $accreditation->id;
                        $data['type'] = 'Radial';
                        $data['scope'] = 'Nacional';
                        if ($rate) {
                            app(UpdateAccreditationRateTask::class)->run(['file_rate' => $file_rate->unique_code], $rate->id);
                        } else {
                            app(CreateAccreditationRateTask::class)->run($data);
                        }
                    }
                }

                // Departamentos
                $states = explode(', ', $item_type_radio->scope_department);
                foreach ($states as $state) {
                    $rate = $rates->where('type', 'Radial')->where('scope', $state)->first();
                    if(isset($request->file('media_radio_file_rate')[$state])) {
                        $file_rate = $this->createFileTask->run($request->file('media_radio_file_rate')[$state], 'accreditation', $accreditation->id, $user);
                        $data['file_rate'] = $file_rate->unique_code;
                        $data['fid_accreditation'] = $accreditation->id;
                        $data['type'] = 'Radial';
                        $data['scope'] = $state;
                        if ($rate) {
                            app(UpdateAccreditationRateTask::class)->run(['file_rate' => $file_rate->unique_code], $rate->id);
                        } else {
                            app(CreateAccreditationRateTask::class)->run($data);
                        }
                    }
                }

            }
        }

        /**
         * IMPRESO
         */
        if ($profile->media_type_print) {
            $item_type_print = $profile->mediaTypes->where('type', 'Impreso')->first();
            if ($item_type_print) {

                // Nacional
                if($item_type_print->scope === 'Nacional') {
                    $rate = $rates->where('type', 'Impreso')->where('scope', 'Nacional')->first();
                    if(isset($request->file('media_print_file_rate')['Nacional'])) {
                        $file_rate = $this->createFileTask->run($request->file('media_print_file_rate')['Nacional'], 'accreditation', $accreditation->id, $user);
                        $data['file_rate'] = $file_rate->unique_code;
                        $data['fid_accreditation'] = $accreditation->id;
                        $data['type'] = 'Impreso';
                        $data['scope'] = 'Nacional';
                        if ($rate) {
                            app(UpdateAccreditationRateTask::class)->run(['file_rate' => $file_rate->unique_code], $rate->id);
                        } else {
                            app(CreateAccreditationRateTask::class)->run($data);
                        }
                    }
                }

                // Departamentos
                $states = explode(', ', $item_type_print->scope_department);
                foreach ($states as $state) {
                    $rate = $rates->where('type', 'Impreso')->where('scope', $state)->first();
                    if(isset($request->file('media_print_file_rate')[$state])) {
                        $file_rate = $this->createFileTask->run($request->file('media_print_file_rate')[$state], 'accreditation', $accreditation->id, $user);
                        $data['file_rate'] = $file_rate->unique_code;
                        $data['fid_accreditation'] = $accreditation->id;
                        $data['type'] = 'Impreso';
                        $data['scope'] = $state;
                        if ($rate) {
                            app(UpdateAccreditationRateTask::class)->run(['file_rate' => $file_rate->unique_code], $rate->id);
                        } else {
                            app(CreateAccreditationRateTask::class)->run($data);
                        }
                    }
                }

            }
        }

        /**
         * DIGITAL
         */
        if ($profile->media_type_digital) {
            $item_type_digital = $profile->mediaTypes->where('type', 'Digital')->first();
            if ($item_type_digital) {

                // Nacional
                if($item_type_digital->scope === 'Nacional') {
                    $rate = $rates->where('type', 'Digital')->where('scope', 'Nacional')->first();
                    if(isset($request->file('media_digital_file_rate')['Nacional'])) {
                        $file_rate = $this->createFileTask->run($request->file('media_digital_file_rate')['Nacional'], 'accreditation', $accreditation->id, $user);
                        $data['file_rate'] = $file_rate->unique_code;
                        $data['fid_accreditation'] = $accreditation->id;
                        $data['type'] = 'Digital';
                        $data['scope'] = 'Nacional';
                        if ($rate) {
                            app(UpdateAccreditationRateTask::class)->run(['file_rate' => $file_rate->unique_code], $rate->id);
                        } else {
                            app(CreateAccreditationRateTask::class)->run($data);
                        }
                    }
                }

                // Departamentos
                $states = explode(', ', $item_type_digital->scope_department);
                foreach ($states as $state) {
                    $rate = $rates->where('type', 'Digital')->where('scope', $state)->first();
                    if(isset($request->file('media_digital_file_rate')[$state])) {
                        $file_rate = $this->createFileTask->run($request->file('media_digital_file_rate')[$state], 'accreditation', $accreditation->id, $user);
                        $data['file_rate'] = $file_rate->unique_code;
                        $data['fid_accreditation'] = $accreditation->id;
                        $data['type'] = 'Digital';
                        $data['scope'] = $state;
                        if ($rate) {
                            app(UpdateAccreditationRateTask::class)->run(['file_rate' => $file_rate->unique_code], $rate->id);
                        } else {
                            app(CreateAccreditationRateTask::class)->run($data);
                        }
                    }
                }

            }
        }

    }
}
