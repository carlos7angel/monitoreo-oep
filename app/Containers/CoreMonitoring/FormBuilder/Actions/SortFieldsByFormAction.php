<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Actions;

use App\Containers\CoreMonitoring\FormBuilder\Tasks\FindFormByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\GetFieldsByFormTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\DB;

class SortFieldsByFormAction extends ParentAction
{
    public function __construct(
        private FindFormByIdTask $findFormByIdTask,
        private GetFieldsByFormTask $getFieldsByFormTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(Request $request)
    {
        $form = $this->findFormByIdTask->run($request->id);
        $ids = is_array($request->forms) ? ($request->forms)[0]['items'] : [];
        return DB::transaction(function () use ($form, $ids) {
            foreach ($form->fields as $field) {
                $key = array_search($field->id, $ids);
                if ($key !== false) {
                    $field->order = $key;
                    $field->save();
                }
            }
        });
    }
}
