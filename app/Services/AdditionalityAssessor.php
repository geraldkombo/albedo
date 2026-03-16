<?php

namespace App\Services;

use App\Models\KncrSubmission;

class AdditionalityAssessor
{
    public function assess(KncrSubmission $submission, array $context = []): KncrSubmission
    {
        // Test 1: Regulatory Surplus
        $regulatorySurplus = true;

        // Test 2: Common Practice
        $market = config('albedo.market');
        $evShare = $market['new_ev_share_2025'] ?? 0.0;
        $threshold = $context['common_practice_threshold_pct'] ?? 50.0;
        $commonPractice = $evShare < $threshold;

        // Test 3: Financial Barrier
        $financialBarrier = $context['financial_barrier'] ?? true;

        $submission->additionality_regulatory_surplus = $regulatorySurplus;
        $submission->additionality_common_practice = $commonPractice;
        $submission->additionality_financial_barrier = $financialBarrier;

        $notes = [];
        if (!$regulatorySurplus) {
            $notes[] = 'Regulatory surplus not demonstrated.';
        }
        if (!$commonPractice) {
            $notes[] = sprintf('EV adoption appears common practice (>=%.1f%%).', $threshold);
        } else {
            $notes[] = sprintf('Common practice supported: EV share %.1f%% < %.1f%%.', $evShare, $threshold);
        }
        if (!$financialBarrier) {
            $notes[] = 'Financial barrier not demonstrated.';
        }

        $submission->additionality_notes = implode(' ', $notes);
        $submission->save();

        return $submission->fresh();
    }
}
