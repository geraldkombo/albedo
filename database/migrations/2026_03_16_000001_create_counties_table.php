<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('counties', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('region', 100)->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->integer('ev_count')->default(0);
            $table->integer('ice_motorcycle_count')->default(0);
            $table->integer('charging_station_count')->default(0);
            $table->integer('swap_station_count')->default(0);
            $table->integer('charging_station_target')->default(0);
            $table->decimal('carbon_offset_potential_tonnes', 12, 4)->nullable();
            $table->enum('ev_plan_status', ['no_plan', 'draft', 'approved', 'implemented'])->default('no_plan')->comment('National E-Mobility Policy compliance');
            $table->text('ev_plan_source')->nullable()->comment('Link to county spatial plan');
            $table->timestamps();

            $table->index('name', 'idx_name');
            $table->index('region', 'idx_region');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('counties');
    }
};
