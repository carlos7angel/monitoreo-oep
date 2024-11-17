<?php

namespace App\Containers\CoreMonitoring\Accreditation\Models;

use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Containers\CoreMonitoring\FileManager\Models\File;
use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Ship\Parents\Models\Model as ParentModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Accreditation extends ParentModel
{
    protected $table = 'media_accreditations';

    protected $fillable = [
        'code',
        'fid_election',
        'fid_user',
        'fid_media_profile',
        'status',
        'observations',
        'file_affidavit',
        'file_request_letter',
        'file_pricing_list',
        'data',
        'status_activity',
        'accredited_by',
        'due_date_observed',
        'submitted_at',
        'accredited_at',
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

        'due_date_observed',
        'submitted_at',
        'accredited_at',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'accreditation';

    /**
     * Eloquent Relationships
     */

    public function election()
    {
        return $this->belongsTo(Election::class, 'fid_election',);
    }

    public function media()
    {
        return $this->belongsTo(MediaProfile::class, 'fid_media_profile',);
    }

    public function fileAffidavit()
    {
        return $this->hasOne(File::class, 'unique_code', 'file_affidavit');
    }

    public function fileRequestLetter()
    {
        return $this->hasOne(File::class, 'unique_code', 'file_request_letter');
    }

    public function rates()
    {
        return $this->hasMany(AccreditationRate::class, 'fid_accreditation');
    }

//    public function filePricingList()
//    {
//        return $this->hasOne(File::class, 'unique_code', 'file_pricing_list');
//    }

    /**
     * Mutators
     */
    protected function submittedAt(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value ? null : Carbon::parse($value)->format('d/m/Y h:i A'),
            // set: static fn (string|null $value): string|null => null === $value ? null : Carbon::createFromFormat('d/m/Y', $value)->toDateTimeString()
        );
    }

    protected function dueDateObserved(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value ? null : Carbon::parse($value)->format('d/m/Y H:i'),
        );
    }

}
