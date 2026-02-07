<?php

namespace App\Livewire;

use Livewire\Component;

class SeatSelection extends Component
{
    public $selectedSeats = [];

    public function toggleSeat($seat)
    {
        if (in_array($seat, $this->selectedSeats)) {
            $this->selectedSeats = array_diff($this->selectedSeats, [$seat]);
        } else {
            $this->selectedSeats[] = $seat;
        }
    }

    public function book()
    {
        // Booking logic
        // session()->flash('message', 'Seats booked!');
    }

    public function render()
    {
        return view('livewire.seat-selection');
    }
}
