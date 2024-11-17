<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\UserManagement;

use App\Ship\Parents\Requests\Request as ParentRequest;

class ListUsersRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => 'super',
    ];

    protected array $decode = [
        // 'id',
    ];

    protected array $urlParameters = [
        // 'id',
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
