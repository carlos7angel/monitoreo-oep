<?php

namespace App\Containers\CoreMonitoring\Election\Models;

use App\Containers\CoreMonitoring\FileManager\Models\File;
use App\Containers\CoreMonitoring\FormBuilder\Models\Form;
use App\Ship\Parents\Models\Model as ParentModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Election extends ParentModel
{
    use SoftDeletes;

    protected $table = 'elections';

    protected $fillable = [
        'name',
        'description',
        'code',
        'election_date',
        'type',
        'status',

        'enable_for_media_registration',
        'start_date_media_registration',
        'end_date_media_registration',
        'fid_form_media_registration',

        'file_bases_media_registration',
        'file_affidavit_media_registration',
        'due_days_observed_media_registration',
        'logo_image',

        'enable_for_monitoring',
        'fid_form_tv_media',
        'fid_form_radio_media',
        'fid_form_print_media',
        'fid_form_digital_media',
        'fid_form_rrss_media',

        'enable_for_political_registration',
        'start_date_political_registration',
        'end_date_political_registration',
        'description_for_political_registration',
        'max_size_for_political_registration',
        'mime_types_for_political_registration',
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

        'election_date',
        'start_date_media_registration',
        'end_date_media_registration',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'election';

    /**
     * Eloquent Relationships
     */

    public function mediaRegistrationForm()
    {
        return $this->belongsTo(Form::class, 'fid_form_media_registration');
    }

    public function fileBasesMediaRegistration()
    {
        return $this->hasOne(File::class, 'unique_code', 'file_bases_media_registration');
    }

    public function fileAffidavitMediaRegistration()
    {
        return $this->hasOne(File::class, 'unique_code', 'file_affidavit_media_registration');
    }

    /**
     * Mutators
     */
    public function getElectionDateAttribute($value) {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function setElectionDateAttribute($value) {
        $this->attributes['election_date'] = $value ? Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d') : null;
    }

    public function setStartDateMediaRegistrationAttribute($value) {
        $this->attributes['start_date_media_registration'] = $value ? Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d 00:00:00'): null;
    }

    public function getStartDateMediaRegistrationAttribute($value) {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function setEndDateMediaRegistrationAttribute($value) {
        $this->attributes['end_date_media_registration'] = $value ? Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d 00:00:00'): null;
    }

    public function getEndDateMediaRegistrationAttribute($value) {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    protected function startDatePoliticalRegistration(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value ? null : Carbon::parse($value)->format('d/m/Y H:i'),
            set: static fn (string|null $value): string|null => null === $value ? null : Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d 00:00:00')
        );
    }

    protected function endDatePoliticalRegistration(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value ? null : Carbon::parse($value)->format('d/m/Y H:i'),
            set: static fn (string|null $value): string|null => null === $value ? null : Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d 23:59:59')
        );
    }
}
