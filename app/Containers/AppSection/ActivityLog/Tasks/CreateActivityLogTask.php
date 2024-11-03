<?php

namespace App\Containers\AppSection\ActivityLog\Tasks;

use App\Containers\AppSection\ActivityLog\Data\Repositories\ActivityLogRepository;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use Spatie\Activitylog\Models\Activity;

class CreateActivityLogTask extends ParentTask
{
    public function __construct(
        protected ActivityLogRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run($_log, $_request, $_subject, $_data = null): Activity
    {
        try {

            $log = $message = '';
            switch ($_log) {
                case LogConstants::ENABLED_USER_MEDIA_ACCOUNT:
                    $log = 'CUENTA HABILITADA';
                    $message = "La cuenta de usuario para " . $_subject->email . " ha sido habilitada";
                    break;
                default:
                    throw new NotFoundException('Activity Log Type Not Found');
                    break;
            }

            $data = [];
            if (empty($_data)) {
                $data = $_subject->toArray();
            }

            $causer = app(GetAuthenticatedUserTask::class)->run();

            activity($log)
                ->causedBy($causer)
                ->tap(function(Activity $activity) use($_request){
                    $activity->user_agent = $_request['HTTP_USER_AGENT'];
                    $activity->ip_address = $_request['REMOTE_ADDR'];
                })
                ->performedOn($_subject)
                ->withProperties($data)
                ->log($message);

            $lastActivity = Activity::all()->last();

            return  $lastActivity;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }

    }
}
