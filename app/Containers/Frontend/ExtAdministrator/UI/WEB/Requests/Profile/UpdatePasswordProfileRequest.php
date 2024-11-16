<?php

namespace App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\Profile;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdatePasswordProfileRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => 'user_media|user_political',
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
            'password' => 'required|min:6|max:50',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
