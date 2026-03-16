<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fleets', function (Blueprint $table) {
            $table->id();
            $table->string('fleet_name', 255);
            $table->enum('fleet_type', ['sacco', 'corporate', 'individual'])->default('sacco');
            $table->foreignId('county_id')->constrained('counties')->cascadeOnDelete();
            $table->string('registration_number', 100)->nullable();
            $table->integer('vehicle_count')->default(0);
            $table->decimal('benefit_share_percentage', 5, 2)->default(25.00)->comment('Regulation 29 mandates minimum 25%');
            $table->enum('cda_status', ['not_required', 'pending', 'signed'])->default('pending')->comment('Community Development Agreement');
            $table->date('cda_signed_date')->nullable();
            $table->date('cda_expiry_date')->nullable();
            $table->boolean('grievance_mechanism_established')->default(false);
            $table->text('grievance_contact_details')->nullable();
            $table->timestamps();

            $table->index('fleet_type', 'idx_fleet_type');
            $table->index('county_id', 'idx_county_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fleets');
    }
};
