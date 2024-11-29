<?php

namespace App\Containers\CoreMonitoring\UserProfile\Tasks;

use App\Containers\CoreMonitoring\FileManager\Tasks\FindFileByCodeTask;
use App\Containers\CoreMonitoring\UserProfile\Data\Repositories\MediaProfileRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class ConvertJsonDataToProfileDataTask extends ParentTask
{
    public function __construct(
        protected MediaProfileRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run($json_data): mixed
    {
        $data = json_decode($json_data, true);

        $data['fileLegalAttorney'] = app(FindFileByCodeTask::class)->run($data['file_power_attorney']);
        $data['fileRepDocument'] = app(FindFileByCodeTask::class)->run($data['file_rep_document']);
        $data['fileNit'] = app(FindFileByCodeTask::class)->run($data['file_nit']);

        $data['mediaTypes'] = [];

        foreach ($data['media_types'] as $key => $item) {
            $data['mediaTypes'][$key] = (object) [
                'type' => $key,
                'coverage' => $item['coverage'],
                'scope' => $item['scope'],
                'scope_department' => $item['scope_department'],
                'scope_area' => $item['scope_area'],
            ];
        }

        $result = (object)$data;

        return $result;

    }
}
