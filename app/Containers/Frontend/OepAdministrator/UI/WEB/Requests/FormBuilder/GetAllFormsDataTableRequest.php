<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\FormBuilder;

use App\Ship\Parents\Requests\Request as ParentRequest;

class GetAllFormsDataTableRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => 'super|admin',
    ];

    protected array $decode = [

    ];

    protected array $urlParameters = [

    ];

    public function rules(): array
    {
        return [

        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
