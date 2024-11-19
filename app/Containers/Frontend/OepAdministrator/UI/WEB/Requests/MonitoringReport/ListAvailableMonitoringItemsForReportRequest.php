<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\MonitoringReport;

use App\Ship\Parents\Requests\Request as ParentRequest;

class ListAvailableMonitoringItemsForReportRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => 'analyst|super|admin',
    ];

    protected array $decode = [
        // 'id',
    ];

    protected array $urlParameters = [
         'id',
         'election_id',
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
