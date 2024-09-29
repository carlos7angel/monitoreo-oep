<?php

namespace App\Containers\CoreMonitoring\UserProfile\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class PoliticalProfile extends ParentModel
{
    protected $table = 'political_user_profiles';

    protected string $resourceKey = 'UserProfile';
}
