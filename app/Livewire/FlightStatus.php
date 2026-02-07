<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Services\AviationstackService;

class FlightStatus extends Component
{
    public $flightNumber = '';
    public $statusResult = null;
    public $isLoading = false;

    public function checkStatus(AviationstackService $aviationService)
    {
        $this->validate([
            'flightNumber' => 'required|min:3',
        ]);

        $this->isLoading = true;

        try {
            // Attempt to get status from API
            $response = $aviationService->getFlightStatus($this->flightNumber);
            
            // For demo purposes, we will just take the first result if multiple exist for that IATA
            $this->statusResult = $response[0] ?? null;
            
        } catch (\Exception $e) {
            // Handle error (e.g., API key missing or network error)
            session()->flash('error', 'Unable to fetch flight status at the moment.');
        } finally {
            $this->isLoading = false;
        }
    }

    #[Layout('layouts.guest')] 
    public function render()
    {
        return view('livewire.flight-status');
    }
}
