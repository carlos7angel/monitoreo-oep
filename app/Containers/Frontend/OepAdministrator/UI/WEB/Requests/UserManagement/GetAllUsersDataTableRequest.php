<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\UserManagement;

use App\Ship\Parents\Requests\Request as ParentRequest;

class GetAllUsersDataTableRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => 'super',
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
