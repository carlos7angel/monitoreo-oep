<?php

namespace App\Containers\CoreMonitoring\Registration\Models;

use App\Containers\CoreMonitoring\FileManager\Models\File;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class PropagandaMaterial extends ParentModel
{
    protected $table = 'propaganda_material';

    protected $fillable = [
        'name',
        'description',
        'type',
        'genre',
        'file_material',
        'link_material',
        'fid_political_registration',
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
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'propaganda_materials';

    /**
     * Eloquent Relationships
     */

    public function politicalRegistration()
    {
        return $this->belongsTo(Registration::class, 'fid_political_registration', );
    }

    public function fileMaterial()
    {
        return $this->hasOne(File::class, 'unique_code', 'file_material');
    }

    /**
     * Mutators
     */
    protected function createdAt(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value
                ? null : Carbon::parse($value)->format('d/m/Y H:i'),
        );
    }

}
