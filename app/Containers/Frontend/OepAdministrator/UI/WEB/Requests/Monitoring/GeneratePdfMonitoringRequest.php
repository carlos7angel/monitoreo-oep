<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\Monitoring;

use App\Ship\Parents\Requests\Request as ParentRequest;

class GeneratePdfMonitoringRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => 'monitor|analyst|secretariat|plenary|super|admin',
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
