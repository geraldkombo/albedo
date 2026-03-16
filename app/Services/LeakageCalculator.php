<?php

namespace App\Services;

use App\Models\CarbonCalculation;

class LeakageCalculator
{
    public function apply(CarbonCalculation $calculation): CarbonCalculation
    {
        $rules = config('albedo.leakage');
        $scenario = $calculation->leakage_scenario ?? 'unknown';

        $pct = match ($scenario) {
            'vehicle_scrapped' => $rules['vehicle_scrapped'],
            'vehicle_resold'   => $rules['vehicle_resold'],
            'vehicle_stored'   => $rules['vehicle_stored'],
            default            => $rules['unknown'],
        };

        $calculation->leakage_deduction_pct = $pct;
        $calculation->save();

        return $calculation->fresh();
    }
}
