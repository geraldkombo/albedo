<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('charging_stations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('county_id')->constrained('counties')->cascadeOnDelete();
            $table->string('location_name', 255);
            $table->string('operator', 255);
            $table->enum('station_type', ['public', 'private', 'swap_station']);
            $table->decimal('capacity_kw', 8, 2)->nullable();
            $table->string('uin', 100)->nullable()->comment('Unique Identification Number');
            $table->enum('status', ['planned', 'under_construction', 'operational', 'decommissioned'])->default('planned');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            $table->string('epra_licence_number', 100)->nullable()->comment('EPRA Retail Supply Licence number');
            $table->enum('epra_licence_status', ['not_applied', 'applied', 'granted', 'expired', 'revoked'])->default('not_applied');
            $table->decimal('metering_accuracy_pct', 4, 2)->default(5.00)->comment('EPRA mandates +/-5%');
            $table->boolean('smart_functionality')->default(false)->comment('EPRA Section 10');
            $table->boolean('api_compliant')->default(false)->comment('EPRA Section 12.3');

            $table->timestamps();

            $table->index('county_id', 'idx_cs_county_id');
            $table->index('station_type', 'idx_station_type');
            $table->index('status', 'idx_cs_status');
            $table->index('epra_licence_status', 'idx_epra_licence_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('charging_stations');
    }
};
