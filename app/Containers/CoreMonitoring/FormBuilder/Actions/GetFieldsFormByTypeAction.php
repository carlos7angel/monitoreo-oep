<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Actions;

use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFormByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\GetFieldsByFormTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class GetFieldsFormByTypeAction extends ParentAction
{
    public function __construct(
        private FindFormByIdTask $findFormByIdTask,
        private GetFieldsByFormTask $getFieldsByFormTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($type, Election $election): mixed
    {
        $form_id = null;
        switch ($type) {
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

        $form = $form_id ? $this->findFormByIdTask->run($form_id) : null;

        $fields = $form ? $this->getFieldsByFormTask->run($form->id) : [];

        return [$form, $fields];
    }
}
