<?php

namespace App\Containers\CoreMonitoring\Accreditation\Models;

use App\Containers\CoreMonitoring\FileManager\Models\File;
use App\Ship\Parents\Models\Model as ParentModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

class AccreditationRate extends ParentModel
{
    protected $table = 'media_accreditation_rates';

    protected $fillable = [

        'fid_accreditation',
        'type',
        'scope',
        'file_rate',
        'submitted_at',
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
        'submitted_at',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'accreditationRate';

    /**
     * Eloquent Relationships
     */

//    public function accreditation()
//    {
//        return $this->belongsTo(Accreditation::class, 'fid_accreditation',);
//    }

    public function fileRate()
    {
        return $this->hasOne(File::class, 'unique_code', 'file_rate');
    }

    /**
     * Mutators
     */
    protected function submittedAt(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value ? null : Carbon::parse($value)->format('d/m/Y H:i'),
            // set: static fn (string|null $value): string|null => null === $value ? null : Carbon::createFromFormat('d/m/Y', $value)->toDateTimeString()
        );
    }

}
