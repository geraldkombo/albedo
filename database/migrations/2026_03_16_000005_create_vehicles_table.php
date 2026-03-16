<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fleet_id')->constrained('fleets')->cascadeOnDelete();
            $table->string('registration_number', 50)->unique();
            $table->string('make', 100);
            $table->string('model', 100);
            $table->year('year');
            $table->decimal('battery_capacity_kwh', 8, 2)->nullable();
            $table->enum('charging_method', ['ec_meter', 'swap_station', 'home_charge', 'public_charge', 'mixed'])->default('mixed');
            $table->string('ec_meter_number', 50)->nullable()->comment('KPLC meter number if applicable');
            $table->date('deployment_date');
            $table->decimal('annual_km_estimate', 10, 2)->default(15000.00);
            $table->timestamps();

            $table->index('fleet_id', 'idx_fleet_id');
            $table->index('charging_method', 'idx_charging_method');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
