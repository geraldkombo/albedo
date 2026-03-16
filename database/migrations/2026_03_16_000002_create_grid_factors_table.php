<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grid_factors', function (Blueprint $table) {
            $table->id();
            $table->string('source_document', 100)->comment('e.g. ASB0050-2020');
            $table->decimal('operating_margin_tco2_per_mwh', 8, 4);
            $table->decimal('build_margin_tco2_per_mwh', 8, 4);
            $table->decimal('combined_margin_tco2_per_mwh', 8, 4);
            $table->date('valid_from');
            $table->date('valid_to');
            $table->timestamps();

            $table->index('source_document', 'idx_source_document');
            $table->index(['valid_from', 'valid_to'], 'idx_valid_from_to');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grid_factors');
    }
};
