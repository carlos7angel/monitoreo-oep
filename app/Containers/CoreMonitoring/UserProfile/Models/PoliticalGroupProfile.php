<?php

namespace App\Containers\CoreMonitoring\UserProfile\Models;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class PoliticalGroupProfile extends ParentModel
{
    use SoftDeletes;

    protected $table = 'political_group_profiles';

    protected $fillable = [
        'name',
        'initials',
        'email',
        'logo',
        'logo',
        'cellphone',
        'foundation_date',
        'description',
        'rep_full_name',
        'rep_document',
        'rep_exp',
        'rep_nationality',
        'rep_cellphone',
        'rep_email',
        'file_power_attorney',
        'file_rep_document',
        'status',
        'credentials_sent',
        'fid_user',
        'registered_at',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',

        'registered_at',
        'foundation_date',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'political_group_profile';

    /**
     * Eloquent Relationships
     */
    public function user()
    {
        return $this->morphOne(User::class, 'profile_data');
    }

    /**
     * Mutators
     */
    public function getFoundationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function setFoundationDateAttribute($value)
    {
        $this->attributes['foundation_date'] = $value ? Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d') : null;
    }

}
