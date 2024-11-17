<?php

namespace App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\PropagandaMaterial;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreatePropagandaMaterialByElectionRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => 'user_political',
    ];

    protected array $decode = [
        // 'id',
    ];

    protected array $urlParameters = [
        'id',
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
