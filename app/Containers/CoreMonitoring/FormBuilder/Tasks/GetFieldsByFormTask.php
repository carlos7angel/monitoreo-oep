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
        //        return $this->repository->findWhere([
        //            'fid_form' => $form_id
        //        ])->all();

        $result = $this->repository->scopeQuery(function ($query) use ($form_id) {
            $query = $query->where('fid_form', '=', $form_id);
            return $query->distinct()->select(['form_fields.*']);
        });

        $result->orderBy('order', 'asc');

        return $result->all()->all();
    }
}
