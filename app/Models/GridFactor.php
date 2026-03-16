<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GridFactor extends Model
{
    protected $fillable = [
        'source_document',
        'operating_margin_tco2_per_mwh', 'build_margin_tco2_per_mwh',
        'combined_margin_tco2_per_mwh',
        'valid_from', 'valid_to',
    ];

    protected $casts = [
        'operating_margin_tco2_per_mwh' => 'decimal:4',
        'build_margin_tco2_per_mwh' => 'decimal:4',
        'combined_margin_tco2_per_mwh' => 'decimal:4',
        'valid_from' => 'date',
        'valid_to' => 'date',
    ];
}
