<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kncr_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fleet_id')->constrained('fleets')->cascadeOnDelete();
            $table->string('project_title', 255);
            $table->text('project_boundary_description')->nullable();
            $table->json('project_county_ids')->nullable()->comment('Array of county IDs');
            $table->decimal('project_boundary_km_radius', 8, 2)->nullable();
            $table->date('crediting_period_start');
            $table->date('crediting_period_end');
            $table->tinyInteger('crediting_period_years')->default(7);
            $table->tinyInteger('crediting_renewal_number')->default(0);
            $table->enum('methodology_standard', ['AMS-III.C v16.0', 'VMR0014'])->default('AMS-III.C v16.0');

            $table->boolean('additionality_regulatory_surplus')->default(true);
            $table->boolean('additionality_common_practice')->default(true);
            $table->boolean('additionality_financial_barrier')->default(true);
            $table->text('additionality_notes')->nullable();

            $table->enum('fpic_status', ['not_required', 'pending', 'obtained'])->default('pending')->comment('Free Prior Informed Consent');
            $table->date('fpic_date')->nullable();
            $table->boolean('safeguards_eia_required')->default(false);
            $table->boolean('safeguards_gender_inclusive')->default(false);
            $table->boolean('safeguards_biodiversity_checked')->default(false);

            $table->enum('article_6_intention', ['domestic_ndc', 'international_vcm', 'article_6_itmo'])->default('domestic_ndc');
            $table->boolean('corresponding_adjustment_required')->default(false);
            $table->enum('target_standard', ['CDM', 'VCS_Verra', 'Gold_Standard', 'Plan_Vivo', 'ACR', 'KNCR_domestic'])->default('VCS_Verra');

            $table->string('kncr_registration_id', 100)->nullable()->comment('KNCR project registration number');
            $table->enum('credit_issuance_status', ['not_issued', 'pending_verification', 'issued', 'retired'])->default('not_issued');
            $table->date('annual_report_due_date')->nullable();
            $table->date('monitoring_period_start')->nullable();
            $table->date('monitoring_period_end')->nullable();
            $table->enum('verification_status', ['not_started', 'in_progress', 'verified', 'failed'])->default('not_started');

            $table->enum('county_support_letter_status', ['not_required', 'pending', 'obtained'])->default('pending');
            $table->date('county_support_letter_date')->nullable();

            $table->enum('status', ['idea', 'feasibility', 'design', 'validation', 'registration', 'monitoring', 'verification', 'credit_issuance', 'retired'])->default('idea');

            $table->text('ndc_contribution_description')->nullable();

            $table->string('pcn_pdf_path', 255)->nullable();
            $table->string('pdd_pdf_path', 255)->nullable();
            $table->json('submission_json')->nullable();

            $table->text('vat_disclaimer')->default('VAT treatment pending regulatory clarification as of March 2026.');
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();

            $table->index('fleet_id', 'idx_kncr_fleet_id');
            $table->index('methodology_standard', 'idx_methodology_standard');
            $table->index('article_6_intention', 'idx_article_6_intention');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kncr_submissions');
    }
};
