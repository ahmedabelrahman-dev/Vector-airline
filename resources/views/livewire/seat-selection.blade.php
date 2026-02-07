<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4 text-primary">Select Your Seat</h2>
    <div class="flex justify-center overflow-x-auto">
        <svg width="300" height="600" viewBox="0 0 300 600" class="border rounded-full bg-gray-50">
            <!-- Airplane Nose -->
            <path d="M50 100 Q150 0 250 100 L250 600 L50 600 Z" fill="white" stroke="#CBD5E1" stroke-width="2" />
            
            <!-- Rows -->
            @foreach(range(1, 10) as $row)
                <!-- Left Seats -->
                <rect x="70" y="{{ 120 + ($row * 40) }}" width="30" height="30" rx="4" 
                      class="cursor-pointer hover:fill-accent transition {{ in_array('A'.$row, $selectedSeats ?? []) ? 'fill-accent' : 'fill-gray-200' }}" 
                      wire:click="toggleSeat('A{{ $row }}')" />
                <text x="85" y="{{ 140 + ($row * 40) }}" font-size="10" text-anchor="middle" fill="#1E293B">A{{ $row }}</text>
                
                <rect x="110" y="{{ 120 + ($row * 40) }}" width="30" height="30" rx="4" 
                      class="cursor-pointer hover:fill-accent transition {{ in_array('B'.$row, $selectedSeats ?? []) ? 'fill-accent' : 'fill-gray-200' }}" 
                       wire:click="toggleSeat('B{{ $row }}')" />
                 <text x="125" y="{{ 140 + ($row * 40) }}" font-size="10" text-anchor="middle" fill="#1E293B">B{{ $row }}</text>

                <!-- Aisle -->

                <!-- Right Seats -->
                <rect x="180" y="{{ 120 + ($row * 40) }}" width="30" height="30" rx="4" 
                      class="cursor-pointer hover:fill-accent transition {{ in_array('C'.$row, $selectedSeats ?? []) ? 'fill-accent' : 'fill-gray-200' }}" 
                       wire:click="toggleSeat('C{{ $row }}')" />
                 <text x="195" y="{{ 140 + ($row * 40) }}" font-size="10" text-anchor="middle" fill="#1E293B">C{{ $row }}</text>

                <rect x="220" y="{{ 120 + ($row * 40) }}" width="30" height="30" rx="4" 
                      class="cursor-pointer hover:fill-accent transition {{ in_array('D'.$row, $selectedSeats ?? []) ? 'fill-accent' : 'fill-gray-200' }}" 
                       wire:click="toggleSeat('D{{ $row }}')" />
                 <text x="235" y="{{ 140 + ($row * 40) }}" font-size="10" text-anchor="middle" fill="#1E293B">D{{ $row }}</text>
            @endforeach
        </svg>
    </div>
    
    <div class="mt-4">
        <p class="text-sm text-gray-600">Selected Seats: <span class="font-bold text-primary">{{ implode(', ', $selectedSeats) }}</span></p>
        <button class="mt-2 w-full bg-accent text-white py-2 rounded hover:bg-sky-600 transition" wire:click="book">Confirm Selection</button>
    </div>
</div>
