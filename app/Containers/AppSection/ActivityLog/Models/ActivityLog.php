<?php

namespace App\Containers\AppSection\ActivityLog\Models;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ActivityLog extends ParentModel
{
    protected $table = 'activity_log';

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'ActivityLog';

    protected $fillable = [
        'log_name',
        'description',
        'subject_id',
        'subject_type',
        'event',
        'causer_id',
        'causer_type',
        'properties',
        'ip_address',
        'user_agent',
        'batch_uuid',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Eloquent
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }

    /**
     * Mutators
     */
    protected function createdAt(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value ? null : Carbon::parse($value)
                ->format('d/m/Y h:i A'),
        );
    }
}
