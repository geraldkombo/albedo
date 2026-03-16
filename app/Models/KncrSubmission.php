<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KncrSubmission extends Model
{
    protected $fillable = [
        'fleet_id', 'project_title', 'project_boundary_description',
        'project_county_ids', 'project_boundary_km_radius',
        'crediting_period_start', 'crediting_period_end',
        'crediting_period_years', 'crediting_renewal_number',
        'methodology_standard',
        'additionality_regulatory_surplus', 'additionality_common_practice',
        'additionality_financial_barrier', 'additionality_notes',
        'fpic_status', 'fpic_date',
        'safeguards_eia_required', 'safeguards_gender_inclusive',
        'safeguards_biodiversity_checked',
        'article_6_intention', 'corresponding_adjustment_required',
        'target_standard',
        'kncr_registration_id', 'credit_issuance_status',
        'annual_report_due_date', 'monitoring_period_start',
        'monitoring_period_end', 'verification_status',
        'county_support_letter_status', 'county_support_letter_date',
        'status', 'ndc_contribution_description',
        'pcn_pdf_path', 'pdd_pdf_path',
        'submission_json', 'vat_disclaimer', 'submitted_at',
    ];

    protected $casts = [
        'project_county_ids' => 'array',
        'project_boundary_km_radius' => 'decimal:2',
        'crediting_period_start' => 'date',
        'crediting_period_end' => 'date',
        'crediting_period_years' => 'integer',
        'crediting_renewal_number' => 'integer',
        'additionality_regulatory_surplus' => 'boolean',
        'additionality_common_practice' => 'boolean',
        'additionality_financial_barrier' => 'boolean',
        'fpic_date' => 'date',
        'safeguards_eia_required' => 'boolean',
        'safeguards_gender_inclusive' => 'boolean',
        'safeguards_biodiversity_checked' => 'boolean',
        'corresponding_adjustment_required' => 'boolean',
        'annual_report_due_date' => 'date',
        'monitoring_period_start' => 'date',
        'monitoring_period_end' => 'date',
        'county_support_letter_date' => 'date',
        'submission_json' => 'array',
        'submitted_at' => 'datetime',
    ];

    public function fleet(): BelongsTo
    {
        return $this->belongsTo(Fleet::class);
    }
}
