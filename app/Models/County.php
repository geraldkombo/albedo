<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class County extends Model
{
    protected $fillable = [
        'name', 'region', 'latitude', 'longitude',
        'ev_count', 'ice_motorcycle_count',
        'charging_station_count', 'swap_station_count',
        'charging_station_target', 'carbon_offset_potential_tonnes',
        'ev_plan_status', 'ev_plan_source',
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'ev_count' => 'integer',
        'ice_motorcycle_count' => 'integer',
        'charging_station_count' => 'integer',
        'swap_station_count' => 'integer',
        'charging_station_target' => 'integer',
        'carbon_offset_potential_tonnes' => 'decimal:4',
    ];

    public function fleets(): HasMany
    {
        return $this->hasMany(Fleet::class);
    }

    public function chargingStations(): HasMany
    {
        return $this->hasMany(ChargingStation::class);
    }
}
