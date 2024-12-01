<?php

namespace App\Containers\CoreMonitoring\Registration\Models;

use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Containers\CoreMonitoring\UserProfile\Models\PoliticalGroupProfile;
use App\Ship\Parents\Models\Model as ParentModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Registration extends ParentModel
{
    protected $table = 'political_registrations';

    protected $fillable = [
        'code',
        'fid_election',
        'fid_user',
        'fid_political_group_profile',
        'status_activity',
        'registered_at',
        'registered_by',
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

        'registered_at',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'registrations';

    /**
     * Eloquent Relationships
     */

    public function election()
    {
        return $this->belongsTo(Election::class, 'fid_election', );
    }

    public function politicalGroup()
    {
        return $this->belongsTo(PoliticalGroupProfile::class, 'fid_political_group_profile', );
    }

    public function materials()
    {
        return $this->hasMany(PropagandaMaterial::class, 'fid_political_registration');
    }

    /**
     * Mutators
     */
    protected function registeredAt(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value
                ? null : Carbon::parse($value)->format('d/m/Y H:i'),
        );
    }

}
