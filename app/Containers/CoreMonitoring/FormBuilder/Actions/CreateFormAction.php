<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\CoreMonitoring\FormBuilder\Models\Form;
use App\Containers\CoreMonitoring\FormBuilder\Tasks\CreateFormTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\Auth;

class CreateFormAction extends ParentAction
{
    protected CreateFormTask $createFormTask;

    public function __construct(CreateFormTask $_task) {
        $this->createFormTask = $_task;
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request): Form
    {
        $sanitizedData = $request->sanitizeInput([
            "form_name",
            "form_type",
            "form_code",
            "form_description",
        ]);

        $data = [
            'unique_code' => $sanitizedData['form_code'],
            'name' => $sanitizedData['form_name'],
            'description' => $sanitizedData['form_description'],
            'type' => $sanitizedData['form_type'],
            'created_by' => Auth::guard('web')->user()->id
        ];

        return $this->createFormTask->run($data);
    }
}
