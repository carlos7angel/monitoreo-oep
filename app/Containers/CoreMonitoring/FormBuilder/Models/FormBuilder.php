<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class FormBuilder extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'FormBuilder';
}
