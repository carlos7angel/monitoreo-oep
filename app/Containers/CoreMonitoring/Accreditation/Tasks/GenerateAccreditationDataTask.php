<?php

namespace App\Containers\CoreMonitoring\Accreditation\Tasks;

use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GenerateAccreditationDataTask extends ParentTask
{
    public function __construct() {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(MediaProfile $profile): mixed
    {
        $data = [];

        $data['email'] = $profile->email;

        $data['name'] = $profile->name;
        $data['business_name'] = $profile->business_name;
        $data['nit'] = $profile->nit;
        $data['rep_full_name'] = $profile->rep_full_name;
        $data['rep_document'] = $profile->rep_document;
        $data['rep_exp'] = $profile->rep_exp;

        $data['legal_address'] = $profile->legal_address;
        $data['cellphone'] = $profile->cellphone;
        $data['website'] = $profile->website;
        $data['rrss'] = $profile->rrss;
        $data['contact_full_name'] = $profile->contact_full_name;

        $data['file_power_attorney'] = $profile->file_power_attorney;
        $data['file_rep_document'] = $profile->file_rep_document;
        $data['file_nit'] = $profile->file_nit;


        $media_types = [];

        $data['media_type_television'] = 0;
        if ($profile->media_type_television) {
            $data['media_type_television'] = 1;
            $media_type_television = $profile->mediaTypes->where('type', 'Televisivo')->first();
            if ($media_type_television) {
                $media_types['Televisivo'] = [
                  'coverage' => $media_type_television->coverage,
                  'scope' => $media_type_television->scope,
                  'scope_department' => $media_type_television->scope_department,
                  'scope_area' => $media_type_television->scope_area,
                ];
            }
        }

        $data['media_type_radio'] = 0;
        if ($profile->media_type_radio) {
            $data['media_type_radio'] = 1;
            $media_type = $profile->mediaTypes->where('type', 'Radial')->first();
            if ($media_type) {
                $media_types['Radial'] = [
                    'coverage' => $media_type->coverage,
                    'scope' => $media_type->scope,
                    'scope_department' => $media_type->scope_department,
                    'scope_area' => $media_type->scope_area,
                ];
            }
        }

        $data['media_type_print'] = 0;
        if ($profile->media_type_print) {
            $data['media_type_print'] = 1;
            $media_type = $profile->mediaTypes->where('type', 'Impreso')->first();
            if ($media_type) {
                $media_types['Impreso'] = [
                    'coverage' => $media_type->coverage,
                    'scope' => $media_type->scope,
                    'scope_department' => $media_type->scope_department,
                    'scope_area' => $media_type->scope_area,
                ];
            }
        }

        $data['media_type_digital'] = 0;
        if ($profile->media_type_digital) {
            $data['media_type_digital'] = 1;
            $media_type = $profile->mediaTypes->where('type', 'Digital')->first();
            if ($media_type) {
                $media_types['Digital'] = [
                    'coverage' => $media_type->coverage,
                    'scope' => $media_type->scope,
                    'scope_department' => $media_type->scope_department,
                    'scope_area' => $media_type->scope_area,
                ];
            }
        }

        $data['media_types'] = $media_types;

        return json_encode($data);
    }
}