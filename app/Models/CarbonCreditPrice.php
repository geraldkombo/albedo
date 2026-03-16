<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarbonCreditPrice extends Model
{
    protected $fillable = [
        'conservative_usd_per_tonne', 'optimistic_usd_per_tonne',
        'usd_ksh_rate', 'effective_date', 'source',
    ];

    protected $casts = [
        'conservative_usd_per_tonne' => 'decimal:2',
        'optimistic_usd_per_tonne' => 'decimal:2',
        'usd_ksh_rate' => 'decimal:4',
        'effective_date' => 'date',
    ];
}
