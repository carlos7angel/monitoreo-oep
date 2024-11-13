<?php

namespace App\Containers\CoreMonitoring\Monitoring\Models;

use App\Containers\CoreMonitoring\Election\Models\Election;
use App\Ship\Parents\Models\Model as ParentModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

class MonitoringReport extends ParentModel
{
    protected $table = 'monitoring_reports';

    protected $fillable = [
        'code',
        'fid_election',
        'status',
        'created_by',
        'submitted_at',
        'observations',
        'scope_type',
        'scope_department',
        'fid_monitoring_item',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'submitted_at',
        'created_at',
        'updated_at',
    ];

    protected string $resourceKey = 'monitoring_report';

    public function election()
    {
        return $this->belongsTo(Election::class, 'fid_election');
    }

    public function monitoringItem()
    {
        return $this->belongsTo(MonitoringItem::class, 'fid_monitoring_item');
    }

    public function monitoringItems()
    {
        return $this->belongsToMany(MonitoringItem::class, 'monitoring_item_report', 'fid_monitoring_report', 'fid_monitoring_item');
    }

    /**
     * Mutators
     */
    protected function createdAt(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value ? null : Carbon::parse($value)->format('d/m/Y h:i A'),
        );
    }

    protected function submittedAt(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value ? null : Carbon::parse($value)->format('d/m/Y h:i A'),
        );
    }
}
