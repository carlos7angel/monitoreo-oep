<?php

namespace App\Containers\CoreMonitoring\Analysis\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Analysis extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Analysis';
}
