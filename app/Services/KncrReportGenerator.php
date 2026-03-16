<?php

namespace App\Services;

use App\Models\KncrSubmission;
use App\Models\CarbonCalculation;
use Barryvdh\DomPDF\Facade\Pdf;

class KncrReportGenerator
{
    public function generatePdf(KncrSubmission $submission): string
    {
        $vehicleIds = $submission->fleet->vehicles->pluck('id');

        $calculations = CarbonCalculation::query()
            ->whereIn('vehicle_id', $vehicleIds)
            ->whereBetween('calculation_date', [
                $submission->crediting_period_start,
                $submission->crediting_period_end
            ])
            ->get();

        $baselineTotal = $calculations->sum('baseline_co2e_tonnes');
        $projectTotal = $calculations->sum('project_co2e_tonnes');
        $netTotal = $calculations->sum('net_reduction_co2e_tonnes');

        $ndcCfg = config('albedo.ndc');
        $targetMt = $ndcCfg['transport_target_reduction_mtco2e'] ?? 3.46;
        $targetTonnes = $targetMt * 1000000;
        $projectNdcPct = $targetTonnes > 0 ? ($netTotal / $targetTonnes) * 100 : 0.0;

        $submission->ndc_contribution_description = sprintf(
            "This project contributes an estimated %.4f%% of Kenya's NDC transport sector reduction target of %.2f MtCO2e by 2030.",
            $projectNdcPct,
            $targetMt
        );
        $submission->save();

        $pdf = Pdf::loadView('kncr.show', [
            'submission'     => $submission->fresh(),
            'calculations'   => $calculations,
            'baseline_total' => $baselineTotal,
            'project_total'  => $projectTotal,
            'net_total'      => $netTotal,
            'project_ndc_pct' => $projectNdcPct,
            'sources'        => config('albedo.sources'),
        ]);

        $filename = sprintf('kncr_draft_%s_%s.pdf', $submission->id, now()->format('Ymd_His'));
        $path = 'kncr/' . $filename;
        $pdf->save(storage_path('app/' . $path));

        $submission->pdd_pdf_path = $path;
        $submission->save();

        return $path;
    }
}
