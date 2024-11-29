<?php

namespace App\Containers\CoreMonitoring\UserProfile\Models;

use App\Containers\AppSection\User\Models\User;
use App\Containers\CoreMonitoring\FileManager\Models\File;
use App\Ship\Parents\Models\Model as ParentModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaProfile extends ParentModel
{
    use SoftDeletes;

    protected $table = 'media_profiles';

    protected $fillable = [
        'name',
        'business_name',
        'description',
        'email',
        'logo',
        'registration_date',
        'legal_address',
        'nit',
        'rep_full_name',
        'rep_document',
        'rep_exp',
        'cellphone',
        'website',
        'contact_full_name',
        'rrss',
        'file_power_attorney',
        'file_rep_document',
        'file_nit',
        'coverage',
        'scope',
        'scope_department',
        'scope_municipality',
        'status',
        'credentials_sent',
        'fid_user',
        'media_type_television',
        'media_type_radio',
        'media_type_print',
        'media_type_digital',
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

        'registration_date',
    ];


    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'mediaUserProfile';

    /**
     * Eloquent Relationships
     */
    public function user()
    {
        return $this->morphOne(User::class, 'profile_data');
    }

    public function fileLegalAttorney()
    {
        return $this->hasOne(File::class, 'unique_code', 'file_power_attorney');
    }

    public function fileRepDocument()
    {
        return $this->hasOne(File::class, 'unique_code', 'file_rep_document');
    }

    public function fileNit()
    {
        return $this->hasOne(File::class, 'unique_code', 'file_nit');
    }

    public function mediaTypes()
    {
        return $this->hasMany(MediaType::class, 'fid_media_profile');
    }

    /**
     * Mutators
     */
    protected function registrationDate(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value ? null : Carbon::parse($value)->format('d/m/Y h:i A'),
        );
    }
}
