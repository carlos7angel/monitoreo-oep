<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Tasks;

use App\Containers\CoreMonitoring\FormBuilder\Data\Repositories\FieldRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetFieldsByFormTask extends ParentTask
{
    public function __construct(
        protected FieldRepository $repository
    ) {
    }

    public function run($form_id): mixed
    {
        return $this->repository->findWhere([
            'fid_form' => $form_id
        ])->all();
    }
}
