<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Actions;

use App\Containers\CoreMonitoring\FormBuilder\Models\Form;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFormByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class FindFormByIdAction extends ParentAction
{
    public function __construct(
        private FindFormByIdTask $findFormByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(Request $request): Form
    {
        return $this->findFormByIdTask->run($request->id);
    }
}
