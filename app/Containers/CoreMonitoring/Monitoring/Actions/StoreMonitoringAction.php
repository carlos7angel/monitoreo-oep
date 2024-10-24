<?php

namespace App\Containers\CoreMonitoring\Monitoring\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFormByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\StoreDataFieldsFormTask;
use App\Containers\CoreMonitoring\Monitoring\Models\Monitoring;
use App\Containers\CoreMonitoring\Monitoring\Tasks\CreateMonitoringTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\UpdateMonitoringTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class StoreMonitoringAction extends ParentAction
{
    public function __construct(
        private CreateMonitoringTask $createMonitoringTask,
        private UpdateMonitoringTask $updateMonitoringTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request): Monitoring
    {
        $election = app(FindElectionByIdTask::class)->run($request->oep_election_id);

        $form_id = null;
        switch ($request->oep_media_type) {
            case 'TV':
                $form_id = $election->fid_form_tv_media;
                break;
            case 'RADIO':
                $form_id = $election->fid_form_radio_media;
                break;
            case 'PRINT':
                $form_id = $election->fid_form_print_media;
                break;
            case 'DIGITAL':
                $form_id = $election->fid_form_digital_media;
                break;
            case 'RRSS':
                $form_id = $election->fid_form_rrss_media;
                break;
        }

        $form = app(FindFormByIdTask::class)->run($form_id);

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $data = [
            'code' => md5(Carbon::now()->timestamp . $user->id .  $request->media_profile . Str::random(24)),
            'media_type' => $request->oep_media_type,
            'fid_election' => $election->id,
            'fid_media_profile' => $request->media_profile,
            'fid_form' => $form->id,
            'status' => 'CREATED',
            'registered_by' => $user->id,
            'registered_at' => Carbon::now()
        ];

        if($user->type === 'TSE' || empty($user->type)) {
            $data['scope_type'] = 'TSE';
            $data['scope_department'] = 'Nacional';
        }
        if($user->type === 'TED') {
            $data['scope_type'] = $user->type ;
            $data['scope_department'] = $user->department;
        }

        $monitoring = $this->createMonitoringTask->run($data);
        $data_form = app(StoreDataFieldsFormTask::class)->run($form, $request, $monitoring);
        $monitoring->code = 'M-' . strtoupper(substr(md5($monitoring->id . $monitoring->created_at . $monitoring->code),0,6)) . '-' . Carbon::now()->format('y');
        $monitoring->data = json_encode($data_form);
        $monitoring->save();

        return $monitoring;

        // $data['code'] = 'M-' . strtoupper(substr(md5($monitoring->id . $monitoring->created_at . $monitoring->code),0,6)) . '-' . Carbon::now()->format('y');
        // $data['data'] = json_encode($data_form);
        // return $this->updateMonitoringTask->run($data, $monitoring->id);
    }
}
