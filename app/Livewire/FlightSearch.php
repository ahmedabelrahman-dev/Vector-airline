<?php

namespace App\Livewire;

use App\Models\Airport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Livewire\Component;

class FlightSearch extends Component
{
    public string $from = '';
    public string $to = '';
    public string $date = '';
    public string $cabin = 'Economy';
    public int $passengers = 1;

    public function search(): RedirectResponse
    {
        return redirect()->route('flights.index', [
            'from' => $this->from,
            'to' => $this->to,
            'date' => $this->date,
            'cabin' => $this->cabin,
            'passengers' => $this->passengers,
        ]);
    }

    public function selectFrom(string $value): void
    {
        $this->from = $value;
    }

    public function selectTo(string $value): void
    {
        $this->to = $value;
    }

    public function getFromSuggestionsProperty(): Collection
    {
        return $this->searchAirports($this->from);
    }

    public function getToSuggestionsProperty(): Collection
    {
        return $this->searchAirports($this->to);
    }

    private function searchAirports(string $query): Collection
    {
        if (mb_strlen(trim($query)) < 2) {
            return collect();
        }

        return Airport::query()
            ->select('name', 'iata_code', 'city')
            ->where(function ($builder) use ($query) {
                $builder
                    ->where('city', 'like', "%{$query}%")
                    ->orWhere('iata_code', 'like', "%{$query}%")
                    ->orWhere('name', 'like', "%{$query}%");
            })
            ->orderBy('city')
            ->limit(6)
            ->get();
    }

    public function render()
    {
        return view('livewire.flight-search');
    }
}
