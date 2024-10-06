<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\FormBuilder;

use App\Ship\Parents\Requests\Request as ParentRequest;

class EditFormFieldRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    protected array $decode = [
        // 'id',
    ];

    protected array $urlParameters = [
        'id',
        'field_id',
    ];

    public function rules(): array
    {
        return [
            // 'id' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
