<?php

namespace App\Containers\CoreMonitoring\Monitoring\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use App\Containers\AppSection\ActivityLog\Events\AddActivityLogEvent;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFormByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\StoreDataFieldsFormTask;
use App\Containers\CoreMonitoring\Monitoring\Models\MonitoringItem;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringByIdTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\FindUserMediaProfileByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class UpdateMonitoringAction extends ParentAction
{
    public function __construct(
        private FindMonitoringByIdTask $findMonitoringByIdTask,
        private StoreDataFieldsFormTask $storeDataFieldsFormTask,
        private FindFormByIdTask $findFormByIdTask,
        private FindUserMediaProfileByIdTask $findUserMediaProfileByIdTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): MonitoringItem
    {
        $monitoring = $this->findMonitoringByIdTask->run($request->id);
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');
        if ($user->id !== $monitoring->registered_by) {
            throw new AuthorizationException('No tiene los permisos para realizar esta acción.');
        }

        $form = $this->findFormByIdTask->run($monitoring->fid_form);

        $monitoring->registered_media = $request->media_registered;
        if ($request->media_registered) {
            $monitoring->fid_media_profile = $request->media_profile;
            $m = $this->findUserMediaProfileByIdTask->run($request->media_profile);
            $monitoring->other_media = $m ? $m->name : "";
        } else {
            $monitoring->fid_media_profile = null;
            $monitoring->other_media = $request->media_profile_text;
        }

        return DB::transaction(function () use ($monitoring, $form, $user, $request) {
            $data_form = $this->storeDataFieldsFormTask->run($form, $request, $monitoring, json_decode($monitoring->data, true));
            $monitoring->data = json_encode($data_form);
            $monitoring->save();

            // Add Log
            App::make(Dispatcher::class)->dispatch(new AddActivityLogEvent(LogConstants::UPDATED_MONITORING, $request->server(), $monitoring));

            return $monitoring;
        });

    }
}
