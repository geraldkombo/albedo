<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carbon_credit_prices', function (Blueprint $table) {
            $table->id();
            $table->decimal('conservative_usd_per_tonne', 10, 2);
            $table->decimal('optimistic_usd_per_tonne', 10, 2);
            $table->decimal('usd_ksh_rate', 10, 4);
            $table->date('effective_date');
            $table->string('source', 255)->nullable();
            $table->timestamps();

            $table->index('effective_date', 'idx_effective_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carbon_credit_prices');
    }
};
