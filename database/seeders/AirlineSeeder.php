<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Airport;
use App\Models\Airplane;
use App\Models\Flight;

class AirlineSeeder extends Seeder
{
    public function run()
    {
        // Airports
        $airports = [
            ['name' => 'John F. Kennedy International Airport', 'iata_code' => 'JFK', 'city' => 'New York', 'country' => 'USA'],
            ['name' => 'Heathrow Airport', 'iata_code' => 'LHR', 'city' => 'London', 'country' => 'UK'],
            ['name' => 'Dubai International Airport', 'iata_code' => 'DXB', 'city' => 'Dubai', 'country' => 'UAE'],
            ['name' => 'Charles de Gaulle Airport', 'iata_code' => 'CDG', 'city' => 'Paris', 'country' => 'France'],
            ['name' => 'Tokyo Haneda Airport', 'iata_code' => 'HND', 'city' => 'Tokyo', 'country' => 'Japan'],
            ['name' => 'Singapore Changi Airport', 'iata_code' => 'SIN', 'city' => 'Singapore', 'country' => 'Singapore'],
        ];

        foreach ($airports as $airport) {
            Airport::firstOrCreate(['iata_code' => $airport['iata_code']], $airport);
        }

        // Airplanes
        $airplanes = [
            ['model' => 'Boeing 777-300ER', 'registration_number' => 'N773VA', 'seat_layout' => json_encode(['rows' => 30, 'cols' => 6])],
            ['model' => 'Airbus A350-900', 'registration_number' => 'F-WWCF', 'seat_layout' => json_encode(['rows' => 30, 'cols' => 6])],
            ['model' => 'Boeing 787-9 Dreamliner', 'registration_number' => 'G-ZBKA', 'seat_layout' => json_encode(['rows' => 25, 'cols' => 6])],
        ];

        foreach ($airplanes as $plane) {
            Airplane::firstOrCreate(['registration_number' => $plane['registration_number']], $plane);
        }

        // Flights
        // Create 20 random flights for the next few days
        $allAirports = Airport::all();
        $allPlanes = Airplane::all();

        for ($i = 0; $i < 20; $i++) {
            $dep = $allAirports->random();
            $arr = $allAirports->where('id', '!=', $dep->id)->random();
            $plane = $allPlanes->random();
            
            $departureTime = now()->addDays(rand(0, 7))->addHours(rand(1, 12));
            $arrivalTime = (clone $departureTime)->addHours(rand(2, 14));

            Flight::create([
                'flight_number' => 'VA' . rand(100, 999),
                'airplane_id' => $plane->id,
                'departure_airport_id' => $dep->id,
                'arrival_airport_id' => $arr->id,
                'departure_time' => $departureTime,
                'arrival_time' => $arrivalTime,
                'price' => rand(200, 1500),
            ]);
        }
    }
}
