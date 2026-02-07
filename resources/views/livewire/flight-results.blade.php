<div class="min-h-screen bg-base text-white">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-xl">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-300">Search results</p>
                    <h1 class="mt-2 text-2xl font-semibold text-white">{{ $from ?: 'Any origin' }} → {{ $to ?: 'Any destination' }}</h1>
                    <p class="mt-1 text-sm text-slate-300">{{ $passengers }} passenger(s) · {{ $date ?: 'Flexible dates' }}</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs text-slate-200">Updated live</span>
                    <a href="{{ route('flights.index') }}" class="rounded-full border border-white/10 px-4 py-2 text-xs text-slate-200">Modify search</a>
                </div>
            </div>
        </div>

        <div class="mt-10 grid gap-8 lg:grid-cols-[260px_1fr]">
            <!-- Sidebar Filters -->
            <div class="space-y-6">
                <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                    <h3 class="text-sm font-semibold text-slate-200">Cabin Class</h3>
                    <div class="mt-4 space-y-3">
                        <label class="flex items-center gap-2 text-sm text-slate-200">
                            <input type="radio" wire:model.live="class" value="economy" class="h-4 w-4 border-white/20 bg-white/5 text-accent focus:ring-accent">
                            Economy
                        </label>
                        <label class="flex items-center gap-2 text-sm text-slate-200">
                            <input type="radio" wire:model.live="class" value="business" class="h-4 w-4 border-white/20 bg-white/5 text-accent focus:ring-accent">
                            Business
                        </label>
                        <label class="flex items-center gap-2 text-sm text-slate-200">
                            <input type="radio" wire:model.live="class" value="first" class="h-4 w-4 border-white/20 bg-white/5 text-accent focus:ring-accent">
                            First Class
                        </label>
                    </div>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                    <h3 class="text-sm font-semibold text-slate-200">Price Range</h3>
                    <div class="mt-4 space-y-3">
                        <div class="flex justify-between text-xs text-slate-400">
                            <span>${{ $minPrice }}</span>
                            <span>${{ $maxPrice }}</span>
                        </div>
                        <input type="range" wire:model.live.debounce.500ms="maxPrice" min="100" max="5000" step="100" class="w-full accent-accent">
                    </div>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                    <h3 class="text-sm font-semibold text-slate-200">Stops</h3>
                    <select wire:model.live="stops" class="mt-3 w-full rounded-xl border-white/10 bg-white/5 text-sm text-slate-200 focus:border-accent focus:ring-accent">
                        <option value="any">Any number of stops</option>
                        <option value="0">Non-stop only</option>
                        <option value="1">1 stop or fewer</option>
                    </select>
                </div>
            </div>

            <!-- Main Results -->
            <div class="space-y-4">
                @if($passengers > 3)
                    <div class="rounded-2xl border border-emerald-400/30 bg-emerald-400/10 p-4 text-sm text-emerald-100">
                        Family Discount applied · 15% off for groups of 4+ passengers.
                    </div>
                @endif

                @forelse($flights as $flight)
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-lg transition hover:-translate-y-0.5" x-data="{ showPrice: true }">
                        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                            <div class="flex items-center gap-4">
                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white/5 text-accent">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-300">{{ $flight->flight_number }}</p>
                                    <p class="text-lg font-semibold text-white">{{ $flight->airplane->model ?? 'Boeing 737' }}</p>
                                </div>
                            </div>

                            <div class="flex flex-1 flex-col items-center gap-3 text-center sm:flex-row sm:justify-center">
                                <div>
                                    <p class="text-2xl font-semibold text-white">{{ \Carbon\Carbon::parse($flight->departure_time)->format('H:i') }}</p>
                                    <p class="text-sm text-slate-400">{{ $flight->departureAirport->iata_code }}</p>
                                </div>
                                <div class="flex flex-col items-center px-4">
                                    <p class="text-xs text-slate-400">
                                        {{ \Carbon\Carbon::parse($flight->departure_time)->diffInHours($flight->arrival_time) }}h
                                        {{ \Carbon\Carbon::parse($flight->departure_time)->diffInMinutes($flight->arrival_time) % 60 }}m
                                    </p>
                                    <div class="mt-2 flex w-28 items-center gap-2">
                                        <span class="h-1 w-1 rounded-full bg-slate-400"></span>
                                        <span class="h-px flex-1 bg-slate-500"></span>
                                        <span class="h-2 w-2 rounded-full bg-accent"></span>
                                    </div>
                                    <p class="mt-2 text-xs text-accent">Non-stop</p>
                                </div>
                                <div>
                                    <p class="text-2xl font-semibold text-white">{{ \Carbon\Carbon::parse($flight->arrival_time)->format('H:i') }}</p>
                                    <p class="text-sm text-slate-400">{{ $flight->arrivalAirport->iata_code }}</p>
                                </div>
                            </div>

                            <div class="w-full rounded-2xl border border-white/10 bg-white/5 p-4 text-center lg:w-56">
                                <p class="text-xs text-slate-400">Total for {{ $passengers }} passenger(s)</p>
                                <div x-show="showPrice" class="mt-2 text-2xl font-semibold text-white">
                                    ${{ number_format($this->calculateTotalPrice($flight->price), 2) }}
                                </div>
                                <button @click="showPrice = !showPrice" class="mt-1 text-xs text-accent underline">Toggle price</button>
                                <button class="mt-4 w-full rounded-xl bg-warning px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-warning/30 transition hover:bg-orange-600">Select</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-8 text-center">
                        <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        <h3 class="mt-4 text-lg font-semibold text-white">No flights found</h3>
                        <p class="mt-2 text-sm text-slate-400">Try adjusting your filters or dates.</p>
                    </div>
                @endforelse

                <div class="pt-4">
                    {{ $flights->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
