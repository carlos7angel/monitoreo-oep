<?php

namespace App\Containers\Frontend\Website\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class StoreFormMediaRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => '',
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
            'media_name' => 'required',
            'media_business_name' => 'required',
            'media_nit' => 'required',
            'media_rep_name' => 'required',
            'media_cellphone' => 'required',
            'media_email' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
