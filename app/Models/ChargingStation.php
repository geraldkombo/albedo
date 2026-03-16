<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChargingStation extends Model
{
    protected $fillable = [
        'county_id', 'location_name', 'operator',
        'station_type', 'capacity_kw', 'uin', 'status',
        'latitude', 'longitude',
        'epra_licence_number', 'epra_licence_status',
        'metering_accuracy_pct', 'smart_functionality', 'api_compliant',
    ];

    protected $casts = [
        'capacity_kw' => 'decimal:2',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'metering_accuracy_pct' => 'decimal:2',
        'smart_functionality' => 'boolean',
        'api_compliant' => 'boolean',
    ];

    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }
}
