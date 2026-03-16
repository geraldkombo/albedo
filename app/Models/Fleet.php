<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Fleet extends Model
{
    protected $fillable = [
        'fleet_name', 'fleet_type', 'county_id',
        'registration_number', 'vehicle_count',
        'benefit_share_percentage', 'cda_status',
        'cda_signed_date', 'cda_expiry_date',
        'grievance_mechanism_established', 'grievance_contact_details',
    ];

    protected $casts = [
        'vehicle_count' => 'integer',
        'benefit_share_percentage' => 'decimal:2',
        'grievance_mechanism_established' => 'boolean',
        'cda_signed_date' => 'date',
        'cda_expiry_date' => 'date',
    ];

    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    public function carbonCalculations(): HasManyThrough
    {
        return $this->hasManyThrough(CarbonCalculation::class, Vehicle::class);
    }

    public function kncrSubmissions(): HasMany
    {
        return $this->hasMany(KncrSubmission::class);
    }
}
