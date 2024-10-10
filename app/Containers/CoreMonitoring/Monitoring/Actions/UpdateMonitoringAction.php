<?php

namespace App\Containers\CoreMonitoring\Monitoring\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFormByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\StoreDataFieldsFormTask;
use App\Containers\CoreMonitoring\Monitoring\Models\Monitoring;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringByIdTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\UpdateMonitoringTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class UpdateMonitoringAction extends ParentAction
{
    public function __construct(
        private UpdateMonitoringTask $updateMonitoringTask,
        private FindMonitoringByIdTask $findMonitoringByIdTask,
        private StoreDataFieldsFormTask $storeDataFieldsFormTask,
        private FindElectionByIdTask $findElectionByIdTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): Monitoring
    {
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $monitoring = $this->findMonitoringByIdTask->run($request->id);

        $form = app(FindFormByIdTask::class)->run($monitoring->fid_form);

        $data = [
            'fid_media_profile' => $request->media_profile,
        ];

        $data_form = $this->storeDataFieldsFormTask->run($form, $request, $monitoring, json_decode($monitoring->data, true));
        $data['data'] = json_encode($data_form);

        return $this->updateMonitoringTask->run($data, $monitoring->id);
    }
}
