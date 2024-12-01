<?php

namespace App\Containers\CoreMonitoring\Analysis\Models;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ActivityAnalysisReport extends ParentModel
{
    protected $table = 'analysis_report_status_activity';

    protected $fillable = [
        'fid_analysis_report',
        'status',
        'previous_status',
        'registered_by',
        'registered_at',
        'observations',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'registered_at',
        'created_at',
        'updated_at',
    ];

    protected string $resourceKey = 'analysis_report_status_activity';

    /**
     * Eloquent
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'registered_by');
    }

    /**
     * Mutators
     */
    protected function registeredAt(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value
                ? null : Carbon::parse($value)->format('d/m/Y h:i A'),
        );
    }
}
