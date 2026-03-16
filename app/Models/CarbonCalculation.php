<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarbonCalculation extends Model
{
    protected $fillable = [
        'vehicle_id', 'calculation_date',
        'distance_km', 'kwh_consumed',
        'baseline_co2e_tonnes', 'project_co2e_tonnes',
        'gross_reduction_co2e_tonnes',
        'leakage_scenario', 'leakage_deduction_pct',
        'data_quality',
    ];

    protected $casts = [
        'calculation_date' => 'date',
        'distance_km' => 'decimal:2',
        'kwh_consumed' => 'decimal:4',
        'baseline_co2e_tonnes' => 'decimal:6',
        'project_co2e_tonnes' => 'decimal:6',
        'gross_reduction_co2e_tonnes' => 'decimal:6',
        'leakage_deduction_pct' => 'decimal:2',
        'net_reduction_co2e_tonnes' => 'decimal:6',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function getNetReductionCo2eTonnesAttribute(): ?string
    {
        return $this->attributes['net_reduction_co2e_tonnes'] ?? null;
    }
}
