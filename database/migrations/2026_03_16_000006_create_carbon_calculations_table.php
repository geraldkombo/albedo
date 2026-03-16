<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carbon_calculations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicles')->cascadeOnDelete();
            $table->date('calculation_date');
            $table->decimal('distance_km', 10, 2);
            $table->decimal('kwh_consumed', 10, 4);
            $table->decimal('baseline_co2e_tonnes', 12, 6)->comment('ICE baseline emissions');
            $table->decimal('project_co2e_tonnes', 12, 6)->comment('EV project emissions');
            $table->decimal('gross_reduction_co2e_tonnes', 12, 6)->comment('Before leakage');
            $table->enum('leakage_scenario', ['vehicle_scrapped', 'vehicle_resold', 'vehicle_stored', 'unknown'])->default('unknown');
            $table->decimal('leakage_deduction_pct', 5, 2)->default(5.00);
            $table->decimal('net_reduction_co2e_tonnes', 12, 6)->storedAs('gross_reduction_co2e_tonnes * (1 - leakage_deduction_pct / 100)')->comment('After leakage deduction');
            $table->enum('data_quality', ['ec_meter_verified', 'station_verified', 'self_reported', 'estimated'])->default('estimated');
            $table->timestamps();

            $table->index('vehicle_id', 'idx_vehicle_id');
            $table->index('calculation_date', 'idx_calculation_date');
            $table->index('data_quality', 'idx_data_quality');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carbon_calculations');
    }
};
