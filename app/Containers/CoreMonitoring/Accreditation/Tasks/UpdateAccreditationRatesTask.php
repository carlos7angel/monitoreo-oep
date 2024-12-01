<?php

namespace App\Containers\CoreMonitoring\Accreditation\Tasks;

use App\Containers\AppSection\User\Models\User;
use App\Containers\CoreMonitoring\Accreditation\Data\Repositories\AccreditationRepository;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateFileTask;
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

        $this->processMediaType(
            $request,
            $user,
            $accreditation,
            $rates,
            $profile,
            'Televisivo',
            'media_type_television',
            'media_television_file_rate'
        );
        $this->processMediaType(
            $request,
            $user,
            $accreditation,
            $rates,
            $profile,
            'Radial',
            'media_type_radio',
            'media_radio_file_rate'
        );
        $this->processMediaType(
            $request,
            $user,
            $accreditation,
            $rates,
            $profile,
            'Impreso',
            'media_type_print',
            'media_print_file_rate'
        );
        $this->processMediaType(
            $request,
            $user,
            $accreditation,
            $rates,
            $profile,
            'Digital',
            'media_type_digital',
            'media_digital_file_rate'
        );
    }

    private function processMediaType(
        $request,
        $user,
        $accreditation,
        $rates,
        $profile,
        $mediaType,
        $keyMediaTypeDB,
        $requestFileKey
    ) {

        if ($profile->{$keyMediaTypeDB}) {
            $itemType = $profile->mediaTypes->where('type', $mediaType)->first();
            if ($itemType) {

                // Nacional
                if ($itemType->scope === 'Nacional') {

                    $this->processScope(
                        $request,
                        $user,
                        $accreditation,
                        $rates,
                        $mediaType,
                        'Nacional',
                        $requestFileKey
                    );

                }

                // Departamentos
                $states = explode(', ', $itemType->scope_department);
                foreach ($states as $state) {

                    $this->processScope(
                        $request,
                        $user,
                        $accreditation,
                        $rates,
                        $mediaType,
                        $state,
                        $requestFileKey
                    );

                }
            }
        }
    }

    private function processScope($request, $user, $accreditation, $rates, $mediaType, $scope, $requestFileKey)
    {
        $rate = $rates->where('type', $mediaType)->where('scope', $scope)->first();
        if (isset($request->file($requestFileKey)[$scope])) {
            $file = $request->file($requestFileKey)[$scope];
            $fileRate = $this->createFileTask->run(
                $file,
                'accreditation',
                $accreditation->id,
                $user
            );

            $data = [
                'file_rate' => $fileRate->unique_code,
                'fid_accreditation' => $accreditation->id,
                'type' => $mediaType,
                'scope' => $scope,
            ];

            if ($rate) {
                app(UpdateAccreditationRateTask::class)
                    ->run(['file_rate' => $fileRate->unique_code], $rate->id);
            } else {
                app(CreateAccreditationRateTask::class)
                    ->run($data);
            }
        }
    }
}
