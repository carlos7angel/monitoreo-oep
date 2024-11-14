<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Tasks;

use App\Containers\CoreMonitoring\FormBuilder\Data\Repositories\FieldRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\DB;

class FindLastOrderKeyFormFieldsTask extends ParentTask
{
    public function __construct(
        protected FieldRepository $repository
    ) {
    }

    public function run($form_id): mixed
    {
        $result = $this->repository->scopeQuery(function ($query) use ($form_id) {
            $query = $query->where('fid_form', '=', $form_id);
            return $query->distinct()->select([
                DB::raw('MAX(form_fields.order) as last_order'),
            ]);
        });

        $last = $result->all()->pluck('last_order')->toArray();

        return is_array($last) ? $last[0] : false;
    }
}
