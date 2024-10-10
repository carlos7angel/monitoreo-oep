<?php

namespace App\Containers\CoreMonitoring\FileManager\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Accreditation\Models\Accreditation;
use App\Containers\CoreMonitoring\Accreditation\Models\AccreditationRate;
use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Containers\CoreMonitoring\Monitoring\Models\Monitoring;
use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetPathByTypeTask extends ParentTask
{
    public function __construct() { }

    public function run($type, $id, $user = null): mixed
    {
        switch (strtolower($type))
        {
            case 'election':
                $fileable_id = $id;
                $fileable_type = Election::class;
                $path = '/elecciones/e-'.$fileable_id;
                break;

            case 'profile-media':
                $fileable_id = $id;
                $fileable_type = MediaProfile::class;
                $path = '/medios/m-'.$fileable_id;
                break;

            case 'accreditation':
                $fileable_id = $id;
                $fileable_type = Accreditation::class;
                $path = '/medios/m-'.$user->profile_data->id.'/acreditaciones/'.$fileable_id;
                break;

//            case 'accreditation-rate':
//                $fileable_id = $id;
//                $fileable_type = AccreditationRate::class;
//                $path = '/medios/m-'.$user->profile_data->id.'/acreditaciones/'.$fileable_id; // (?) !!!
//                break;

            case 'monitoring':
                $fileable_id = $id;
                $fileable_type = Monitoring::class;
                $path = '/monitoreo/d-'.$fileable_id;
                break;

            default:
                break;
        }

        return [$path,$fileable_type,$fileable_id];
    }
}
