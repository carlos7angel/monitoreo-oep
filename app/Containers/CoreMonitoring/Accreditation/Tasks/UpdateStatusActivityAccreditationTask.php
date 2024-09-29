<?php

namespace App\Containers\CoreMonitoring\Accreditation\Tasks;

use App\Containers\CoreMonitoring\Accreditation\Data\Repositories\AccreditationRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;

class UpdateStatusActivityAccreditationTask extends ParentTask
{
    public function __construct(
        protected AccreditationRepository $repository,
    ) {
    }

    public function run($old_status_activity, $new_status, $observations, $user_id): mixed
    {
        if (empty($old_status_activity)) {
            $activity = null;
        } else {
            $activity = json_decode($old_status_activity);
        }

        $record = [
            'status' => $new_status,
            'observations' => $observations,
            'updated_by' => $user_id,
            'updated_at' => Carbon::now()->toDateTimeString()
        ];

        if (! is_array($activity)) {
            $activity =  [];
        }
        $activity[] = (object) $record;

        return json_encode($activity);
    }
}
