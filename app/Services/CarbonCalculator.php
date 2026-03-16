<?php

namespace App\Services;

use App\Models\Vehicle;
use App\Models\CarbonCalculation;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class CarbonCalculator
{
    public function calculate(
        Vehicle $vehicle,
        Carbon $periodStart,
        Carbon $periodEnd,
        float $distanceKm,
        ?float $kwhConsumed = null,
        array $overrides = []
    ): CarbonCalculation {
        $baseline = config('albedo.baseline');
        $projectCfg = config('albedo.project');

        $fuelEff = Arr::get($overrides, 'fuel_efficiency_km_per_litre', $baseline['fuel_efficiency_km_per_litre']);
        $efKgPerTj = Arr::get($overrides, 'petrol_emission_factor_kg_per_tj', $baseline['petrol_emission_factor_kg_per_tj']);
        $ncvTjPerKg = Arr::get($overrides, 'petrol_ncv_tj_per_kg', $baseline['petrol_ncv_tj_per_kg']);
        $densityKgPerL = Arr::get($overrides, 'petrol_density_kg_per_litre', $baseline['petrol_density_kg_per_litre']);
        $kwhPerKm = Arr::get($overrides, 'ev_consumption_kwh_per_km', $projectCfg['ev_consumption_kwh_per_km']);
        $gridCm = Arr::get($overrides, 'grid_cm_factor_tco2_per_mwh', $projectCfg['grid_cm_factor_tco2_per_mwh']);

        if ($kwhConsumed === null) {
            $kwhConsumed = $distanceKm * $kwhPerKm;
        }

        // Baseline emissions (ICE) - IPCC Tier 1
        $fuelLitres = $distanceKm / $fuelEff;
        $fuelKg = $fuelLitres * $densityKgPerL;
        $fuelEnergyTj = $fuelKg * $ncvTjPerKg;
        $baselineKg = $fuelEnergyTj * $efKgPerTj;
        $baselineTonnes = $baselineKg / 1000.0;

        // Project emissions (EV)
        $projectTonnes = ($kwhConsumed * $gridCm) / 1000.0;

        $calc = new CarbonCalculation();
        $calc->vehicle_id = $vehicle->id;
        $calc->calculation_date = $periodStart;
        $calc->distance_km = $distanceKm;
        $calc->kwh_consumed = $kwhConsumed;
        $calc->baseline_co2e_tonnes = $baselineTonnes;
        $calc->project_co2e_tonnes = $projectTonnes;
        $calc->gross_reduction_co2e_tonnes = $baselineTonnes - $projectTonnes;
        $calc->leakage_scenario = Arr::get($overrides, 'leakage_scenario', 'unknown');
        $calc->leakage_deduction_pct = Arr::get($overrides, 'leakage_deduction_pct', 5.0);
        $calc->data_quality = $vehicle->charging_method === 'ec_meter' ? 'ec_meter_verified' : 'estimated';
        $calc->save();

        return $calc->fresh();
    }
}
