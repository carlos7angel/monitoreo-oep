<?php

namespace App\Containers\AppSection\Authentication\UI\WEB\Requests;

use App\Containers\AppSection\Authentication\Classes\LoginFieldProcessor;
use App\Ship\Parents\Requests\Request as ParentRequest;

class ResetPasswordRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [];

    protected array $urlParameters = [];

    public function rules(): array
    {
        $rules = [
            'token' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:50',
        ];

        return LoginFieldProcessor::mergeValidationRules($rules);
    }

    public function authorize(): bool
    {
        return $this->hasAccess();
    }
}
