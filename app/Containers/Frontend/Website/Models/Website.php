<?php

namespace App\Containers\Frontend\Website\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Website extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Website';
}
