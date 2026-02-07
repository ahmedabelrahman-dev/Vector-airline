<div>
    <form wire:submit.prevent="search" class="grid grid-cols-1 gap-4 lg:grid-cols-5 lg:items-end">
        <div class="relative">
            <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">From</label>
            <input type="text" placeholder="City or Airport" wire:model.live.debounce.300ms="from" class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-primary focus:ring-primary" />
            @if ($this->fromSuggestions->isNotEmpty())
                <div class="absolute z-30 mt-2 w-full rounded-2xl border border-slate-200 bg-white p-2 text-sm shadow-xl">
                    @foreach ($this->fromSuggestions as $airport)
                        <button type="button" wire:click="selectFrom(@js($airport->city . ' (' . $airport->iata_code . ')'))" class="flex w-full flex-col items-start rounded-xl px-3 py-2 text-left transition hover:bg-slate-100">
                            <span class="font-semibold text-slate-900">{{ $airport->city }}</span>
                            <span class="text-xs text-slate-500">{{ $airport->name }} ({{ $airport->iata_code }})</span>
                        </button>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="relative">
            <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">To</label>
            <input type="text" placeholder="City or Airport" wire:model.live.debounce.300ms="to" class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-primary focus:ring-primary" />
            @if ($this->toSuggestions->isNotEmpty())
                <div class="absolute z-30 mt-2 w-full rounded-2xl border border-slate-200 bg-white p-2 text-sm shadow-xl">
                    @foreach ($this->toSuggestions as $airport)
                        <button type="button" wire:click="selectTo(@js($airport->city . ' (' . $airport->iata_code . ')'))" class="flex w-full flex-col items-start rounded-xl px-3 py-2 text-left transition hover:bg-slate-100">
                            <span class="font-semibold text-slate-900">{{ $airport->city }}</span>
                            <span class="text-xs text-slate-500">{{ $airport->name }} ({{ $airport->iata_code }})</span>
                        </button>
                    @endforeach
                </div>
            @endif
        </div>

        <div>
            <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Date</label>
            <input type="date" wire:model="date" class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-primary focus:ring-primary" />
        </div>

        <div>
            <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Class</label>
            <select wire:model="cabin" class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-primary focus:ring-primary">
                <option>Economy</option>
                <option>Premium Economy</option>
                <option>Business</option>
                <option>First</option>
            </select>
        </div>

        <div>
            <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-2xl bg-highlight px-4 py-3 text-sm font-semibold text-slate-900 shadow-lg shadow-highlight/30 transition hover:bg-highlight/90">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                Search Flights
            </button>
        </div>

        <input type="hidden" wire:model="passengers">
    </form>
</div>
