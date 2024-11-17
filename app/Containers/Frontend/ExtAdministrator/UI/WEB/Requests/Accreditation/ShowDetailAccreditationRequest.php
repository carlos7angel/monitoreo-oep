<?php

namespace App\Containers\Frontend\ExtAdministrator\UI\WEB\Requests\Accreditation;

use App\Ship\Parents\Requests\Request as ParentRequest;

class ShowDetailAccreditationRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => 'user_media',
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
