<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'departure_time' => 'datetime',
        'arrival_time' => 'datetime',
        'seat_availability' => 'array',
    ];

    public function airplane(): BelongsTo
    {
        return $this->belongsTo(Airplane::class);
    }

    public function departureAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'departure_airport_id');
    }

    public function arrivalAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'arrival_airport_id');
    }
}
