<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    protected $fillable = [
        'fleet_id', 'registration_number', 'make', 'model', 'year',
        'battery_capacity_kwh', 'charging_method', 'ec_meter_number',
        'deployment_date', 'annual_km_estimate',
    ];

    protected $casts = [
        'year' => 'integer',
        'battery_capacity_kwh' => 'decimal:2',
        'deployment_date' => 'date',
        'annual_km_estimate' => 'decimal:2',
    ];

    public function fleet(): BelongsTo
    {
        return $this->belongsTo(Fleet::class);
    }

    public function carbonCalculations(): HasMany
    {
        return $this->hasMany(CarbonCalculation::class);
    }
}
