<div class="min-h-screen bg-navy-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        
        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-white mb-2">Flight Status Tracker</h1>
            <p class="text-sky-200">Real-time updates for Vector Air and partner flights</p>
        </div>

        <!-- Search Box -->
        <div class="bg-white rounded-xl shadow-2xl p-6 mb-8 transform hover:scale-[1.01] transition-all duration-300">
            <form wire:submit.prevent="checkStatus" class="relative">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-grow">
                        <label for="flightNumber" class="block text-sm font-medium text-gray-700 mb-1">Flight Number (IATA)</label>
                        <input wire:model="flightNumber" type="text" id="flightNumber" 
                            class="w-full rounded-lg border-gray-300 focus:border-sky-500 focus:ring focus:ring-sky-200 transition-all font-mono text-lg uppercase placeholder-gray-400" 
                            placeholder="e.g. VA1024">
                        @error('flightNumber') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex items-end">
                        <button type="submit" 
                            class="w-full md:w-auto px-8 py-3 bg-sky-500 hover:bg-sky-600 text-white font-bold rounded-lg shadow-lg hover:shadow-sky-500/50 transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                            <span wire:loading.remove>Track Flight</span>
                            <span wire:loading>Searching...</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Results Area -->
        <div class="space-y-6">
            @if(session()->has('error'))
                <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded text-red-700">
                    <p class="font-bold">Error</p>
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            @if($statusResult)
                <div class="bg-white rounded-xl shadow-xl overflow-hidden animate-fade-in-up">
                    <div class="bg-navy-800 p-4 flex justify-between items-center">
                        <div class="flex items-center space-x-3">
                            <div class="h-10 w-10 bg-sky-500 rounded-full flex items-center justify-center font-bold text-white">
                                {{ substr($statusResult['airline']['iata'] ?? 'VA', 0, 2) }}
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">{{ $statusResult['flight']['iata'] ?? $flightNumber }}</h3>
                                <p class="text-sky-200 text-sm">{{ $statusResult['airline']['name'] ?? 'Vector Air' }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                {{ ($statusResult['flight_status'] ?? '') == 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($statusResult['flight_status'] ?? 'Scheduled') }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Departure -->
                        <div class="text-center md:text-left">
                            <p class="text-sm text-gray-500 mb-1">Departure</p>
                            <div class="text-3xl font-bold text-navy-900">{{ $statusResult['departure']['iata'] ?? '---' }}</div>
                            <p class="text-gray-700">{{ $statusResult['departure']['airport'] ?? 'Unknown Airport' }}</p>
                            <p class="text-sky-600 font-mono mt-2">
                                {{ \Carbon\Carbon::parse($statusResult['departure']['scheduled'] ?? now())->format('H:i') }}
                            </p>
                        </div>

                        <!-- Flight Path Graphic -->
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-full flex items-center mb-2">
                                <div class="h-1 flex-1 bg-gray-200 rounded-full relative">
                                    <div class="absolute h-full bg-sky-500 rounded-full" style="width: 60%"></div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-500 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                            </div>
                            <p class="text-xs text-gray-400">Duration: 4h 20m</p>
                        </div>

                        <!-- Arrival -->
                        <div class="text-center md:text-right">
                            <p class="text-sm text-gray-500 mb-1">Arrival</p>
                            <div class="text-3xl font-bold text-navy-900">{{ $statusResult['arrival']['iata'] ?? '---' }}</div>
                            <p class="text-gray-700">{{ $statusResult['arrival']['airport'] ?? 'Unknown Airport' }}</p>
                            <p class="text-sky-600 font-mono mt-2">
                                {{ \Carbon\Carbon::parse($statusResult['arrival']['scheduled'] ?? now())->format('H:i') }}
                            </p>
                        </div>
                    </div>
                </div>
            @elseif($flightNumber && !$isLoading && !$errors->any() && !session()->has('error'))
                 <div class="text-center py-10">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-medium text-white">No flight information found</h3>
                    <p class="text-gray-400 mt-2">Try searching for a valid flight number (e.g., UA123)</p>
                </div>
            @endif
        </div>
        
    </div>
</div>
