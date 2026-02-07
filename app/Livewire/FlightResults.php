<?php

namespace App\Livewire;

use App\Models\Flight;
use App\Models\Airport;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class FlightResults extends Component
{
    use WithPagination;

    public $from = '';
    public $to = '';
    public $date = '';
    public $passengers = 1;
    
    // Filters
    public $class = 'economy';
    public $minPrice = 0;
    public $maxPrice = 5000;
    public $stops = 'any';

    protected $queryString = [
        'from', 'to', 'date', 'passengers',
        'class' => ['except' => 'economy'],
        'minPrice' => ['except' => 0],
        'maxPrice' => ['except' => 5000],
        'stops' => ['except' => 'any'],
    ];

    public function mount()
    {
        $this->from = request()->query('from', '');
        $this->to = request()->query('to', '');
        $this->date = request()->query('date', '');
        $this->passengers = request()->query('passengers', 1);
    }

    public function getFlightsProperty()
    {
        // Parsing input like "London (LHR)" to just "LHR" if needed, 
        // but simple search will try to match airport code or city name.
        
        $query = Flight::query()
            ->with(['airplane', 'departureAirport', 'arrivalAirport']);

        if ($this->from) {
            $fromTerm = $this->extractCode($this->from);
            $query->whereHas('departureAirport', function ($q) use ($fromTerm) {
                $q->where('iata_code', $fromTerm)
                  ->orWhere('city', 'like', "%{$this->from}%");
            });
        }

        if ($this->to) {
            $toTerm = $this->extractCode($this->to);
            $query->whereHas('arrivalAirport', function ($q) use ($toTerm) {
                $q->where('iata_code', $toTerm)
                  ->orWhere('city', 'like', "%{$this->to}%");
            });
        }

        if ($this->date) {
            $query->whereDate('departure_time', $this->date);
        }

        // Price Filter
        $query->whereBetween('price', [$this->minPrice, $this->maxPrice]);

        return $query->paginate(10);
    }

    private function extractCode($string)
    {
        // Extract content inside parenthesis if present
        if (preg_match('/\((.*?)\)/', $string, $match) == 1) {
            return $match[1];
        }
        return $string;
    }

    public function calculateTotalPrice($basePrice)
    {
        $subtotal = $basePrice * $this->passengers;
        
        // Family Discount: 15% off if more than 3 passengers
        if ($this->passengers > 3) {
            $subtotal = $subtotal * 0.85;
        }
        
        // Class Multiplier (Mock logic as standard DB price is base)
        $multiplier = match($this->class) {
            'business' => 2.5,
            'first' => 4.0,
            default => 1.0,
        };

        return $subtotal * $multiplier;
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.flight-results', [
            'flights' => $this->flights
        ]);
    }
}
