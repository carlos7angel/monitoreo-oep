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

        $data['type'] = $profile->type;
        $data['coverage'] = $profile->coverage;
        $data['scope'] = $profile->scope;
        $data['scope_department'] = $profile->scope_department;
        $data['scope_municipality'] = $profile->scope_municipality;

        $data['legal_address'] = $profile->legal_address;
        $data['cellphone'] = $profile->cellphone;
        $data['website'] = $profile->website;
        $data['rrss'] = $profile->rrss;
        $data['contact_full_name'] = $profile->contact_full_name;

        $data['file_power_attorney'] = $profile->file_power_attorney;
        $data['file_rep_document'] = $profile->file_rep_document;
        $data['file_nit'] = $profile->file_nit;

        return json_encode($data);
    }
}