<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class OpenSkyService
{
    protected string $baseUrl;
    protected string $username;
    protected string $password;

    public function __construct()
    {
        $this->baseUrl = 'https://opensky-network.org/api';
        $this->username = config('services.opensky.username');
        $this->password = config('services.opensky.password');
    }

    public function getLiveFlightsByArea(float $lamin, float $lomin, float $lamax, float $lomax)
    {
        // Developer Mock Data
        // Center the mock flights in the requested area
        $centerLat = ($lamin + $lamax) / 2;
        $centerLon = ($lomin + $lomax) / 2;
        $time = time();

        // [icao24, callsign, origin_country, time_position, last_contact, longitude, latitude, baro_altitude, on_ground, velocity, true_track, vertical_rate, sensors, geo_altitude, squawk, spi, position_source]
        return [
             ['a835af', 'VA101', 'United States', $time, $time, $centerLon - 0.5, $centerLat - 0.5, 12000, false, 250, 45, 0, null, 12500, '7700', false, 0],
             ['4d2219', 'VA202', 'United Kingdom', $time, $time, $centerLon + 0.2, $centerLat + 0.3, 34000, false, 480, 270, 0, null, 35000, '2300', false, 0],
             ['e80111', 'VA888', 'UAE', $time, $time, $centerLon + 0.6, $centerLat - 0.2, 28000, false, 450, 180, -5, null, 28500, '1200', false, 0],
        ];
    }
    
    // Get flights for a specific airport within a time window (Unix timestamps)
    public function getFlightsByAirport(string $icao, int $begin, int $end, string $type = 'departure')
    {
        // Developer Mock Data
        return [
            [
                'icao24' => 'a835af',
                'firstSeen' => $begin + 3600,
                'estDepartureAirport' => $icao,
                'lastSeen' => $begin + 18000,
                'estArrivalAirport' => 'KJFK',
                'callsign' => 'VA101',
                'estDepartureAirportHorizDistance' => 0,
                'estDepartureAirportVertDistance' => 0,
                'estArrivalAirportHorizDistance' => 0,
                'estArrivalAirportVertDistance' => 0,
                'departureAirportCandidatesCount' => 0,
                'arrivalAirportCandidatesCount' => 0
            ]
        ];
    }
}
