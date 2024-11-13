<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\PoliticalGroup;

use App\Ship\Parents\Requests\Request as ParentRequest;

class ListMaterialPoliticalGroupByElectionRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => '',
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
