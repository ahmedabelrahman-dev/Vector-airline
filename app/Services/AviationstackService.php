<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AviationstackService
{
    protected string $baseUrl;
    protected string $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.aviationstack.base_url', 'http://api.aviationstack.com/v1');
        $this->apiKey = config('services.aviationstack.api_key');
    }

    public function getFlightStatus(string $flightIata)
    {
        // Developer Mock Data
        $now = now();
        $date = $now->format('Y-m-d');
        
        return [
            [
                'flight_date' => $date,
                'flight_status' => 'active',
                'departure' => [
                     'airport' => 'Departure Airport',
                     'timezone' => 'UTC',
                     'iata' => 'DEP',
                     'icao' => 'KDEP',
                     'terminal' => '1',
                     'gate' => 'A1',
                     'delay' => 15,
                     'scheduled' => $now->copy()->subHours(1)->toIso8601String(),
                     'estimated' => $now->copy()->subHours(1)->addMinutes(15)->toIso8601String(),
                     'actual' => $now->copy()->subHours(1)->addMinutes(15)->toIso8601String(),
                ],
                'arrival' => [
                     'airport' => 'Arrival Airport',
                     'timezone' => 'UTC',
                     'iata' => 'ARR',
                     'icao' => 'KARR',
                     'terminal' => '2',
                     'gate' => 'B2',
                     'baggage' => 'C',
                     'delay' => null,
                     'scheduled' => $now->copy()->addHours(2)->toIso8601String(),
                     'estimated' => $now->copy()->addHours(2)->toIso8601String(),
                     'actual' => null,
                ],
                'airline' => [
                     'name' => 'Vector Air',
                     'iata' => 'VA',
                     'icao' => 'VCT',
                ],
                'flight' => [
                     'number' => preg_replace('/[^0-9]/', '', $flightIata) ?: '1024',
                     'iata' => strtoupper($flightIata),
                     'icao' => 'VCT' . (preg_replace('/[^0-9]/', '', $flightIata) ?: '1024'),
                     'codeshared' => null,
                ],
            ]
        ];
    }

    public function getRealTimeFlights()
    {
        // Developer Mock Data
        return $this->getFlightStatus('VA100');
    }
}
