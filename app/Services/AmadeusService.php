<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Client\Response;

class AmadeusService
{
    protected string $baseUrl;
    protected string $clientId;
    protected string $clientSecret;

    public function __construct()
    {
        $this->baseUrl = config('services.amadeus.base_url', 'https://test.api.amadeus.com/v2');
        $this->clientId = config('services.amadeus.client_id');
        $this->clientSecret = config('services.amadeus.client_secret');
    }

    protected function getAccessToken(): string
    {
        // Mock Access Token
        return 'mock_access_token_' . uniqid();
    }

    public function searchFlights(string $origin, string $destination, string $date, int $adults = 1)
    {
        // Developer Mock Data
        return [
            [
                'id' => '1',
                'price' => ['total' => '150.00', 'currency' => 'USD'],
                'itineraries' => [
                    [
                        'segments' => [
                            [
                                'departure' => ['iataCode' => $origin, 'at' => $date . 'T08:00:00'],
                                'arrival' => ['iataCode' => $destination, 'at' => $date . 'T11:00:00'],
                                'carrierCode' => 'VA',
                                'number' => '101'
                            ]
                        ]
                    ]
                ]
            ],
            [
                'id' => '2',
                'price' => ['total' => '230.00', 'currency' => 'USD'],
                'itineraries' => [
                    [
                        'segments' => [
                            [
                                'departure' => ['iataCode' => $origin, 'at' => $date . 'T14:30:00'],
                                'arrival' => ['iataCode' => $destination, 'at' => $date . 'T17:30:00'],
                                'carrierCode' => 'VA',
                                'number' => '305'
                            ]
                        ]
                    ]
                ]
            ],
            [
                'id' => '3',
                'price' => ['total' => '450.00', 'currency' => 'USD'],
                'itineraries' => [
                    [
                        'segments' => [
                            [
                                'departure' => ['iataCode' => $origin, 'at' => $date . 'T18:00:00'],
                                'arrival' => ['iataCode' => $destination, 'at' => $date . 'T21:00:00'],
                                'carrierCode' => 'VA',
                                'number' => '900'
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}
