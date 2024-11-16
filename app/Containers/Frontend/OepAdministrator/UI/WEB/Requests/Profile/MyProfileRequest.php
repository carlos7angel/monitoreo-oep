<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Profile;

use App\Ship\Parents\Requests\Request as ParentRequest;

class MyProfileRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => 'super|admin|media|monitor|analyst|secretariat|plenary',
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
