<x-guest-layout>
    @php
        $theme = match ($class) {
            'economy' => [
                'accent' => 'sky-400',
                'accentText' => 'text-sky-300',
                'accentBg' => 'bg-sky-500',
                'accentRing' => 'ring-sky-400',
                'accentBorder' => 'border-sky-400/30',
            ],
            'business' => [
                'accent' => 'slate-300',
                'accentText' => 'text-slate-200',
                'accentBg' => 'bg-slate-300',
                'accentRing' => 'ring-slate-300',
                'accentBorder' => 'border-slate-200/30',
            ],
            'first' => [
                'accent' => 'amber-400',
                'accentText' => 'text-amber-300',
                'accentBg' => 'bg-amber-400',
                'accentRing' => 'ring-amber-300',
                'accentBorder' => 'border-amber-300/30',
            ],
            default => [
                'accent' => 'sky-400',
                'accentText' => 'text-sky-300',
                'accentBg' => 'bg-sky-500',
                'accentRing' => 'ring-sky-400',
                'accentBorder' => 'border-sky-400/30',
            ],
        };
    @endphp

    <div class="min-h-screen bg-slate-950 text-white">
        <!-- Hero -->
        <section class="relative h-[60vh] min-h-[420px]">
            <div class="absolute inset-0 bg-center bg-cover" style="background-image: url('{{ $hero_image }}')"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/90 via-slate-900/60 to-slate-950/30"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-slate-950/30"></div>

            <div class="relative z-10 max-w-6xl mx-auto px-6 lg:px-8 h-full flex items-end pb-12">
                <div class="max-w-2xl">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-white transition hover:bg-white/20">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 18l-6-6 6-6" />
                        </svg>
                        Go back
                    </a>
                    <p class="uppercase tracking-[0.3em] text-xs {{ $theme['accentText'] }}">Vector Air Experience</p>
                    <h1 class="mt-4 text-4xl md:text-5xl font-extrabold">{{ $title }}</h1>
                    <p class="mt-4 text-lg text-slate-200">{{ $description }}</p>
                    <div class="mt-6 inline-flex items-center gap-3 text-sm text-slate-300">
                        <span class="px-3 py-1 rounded-full border {{ $theme['accentBorder'] }}">
                            Price Multiplier: {{ number_format($price_multiplier, 1) }}x
                        </span>
                        <span class="px-3 py-1 rounded-full border border-white/10">Curated for comfort</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Info Grid -->
        <section class="max-w-6xl mx-auto px-6 lg:px-8 py-14">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold">Signature Features</h2>
                <div class="hidden md:flex items-center gap-2 text-sm text-slate-300">
                    <span class="w-2 h-2 rounded-full {{ $theme['accentBg'] }}"></span>
                    Ambient Theme
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($features as $feature)
                    <div class="group bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur">
                        <div class="flex items-center gap-4">
                            <div class="h-12 w-12 rounded-xl bg-white/5 border {{ $theme['accentBorder'] }} flex items-center justify-center">
                                <svg class="h-6 w-6 {{ $theme['accentText'] }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-lg font-semibold">{{ $feature }}</p>
                                <p class="text-sm text-slate-400">Refined for {{ strtolower($title) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Reviews -->
        <section class="max-w-6xl mx-auto px-6 lg:px-8 pb-28">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold">Passenger Reviews</h2>
                <div class="text-sm text-slate-400">Average rating 4.9</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($reviews as $review)
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur">
                        <div class="flex items-center gap-3">
                            <img src="{{ $review['avatar'] }}" alt="{{ $review['name'] }}" class="h-12 w-12 rounded-full object-cover">
                            <div>
                                <p class="font-semibold">{{ $review['name'] }}</p>
                                <div class="flex items-center gap-1 text-amber-300">
                                    @for ($i = 0; $i < $review['rating']; $i++)
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.54-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.719c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <p class="mt-4 text-sm text-slate-300">“{{ $review['comment'] }}”</p>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Sticky CTA -->
        <div class="fixed bottom-0 inset-x-0 z-40 md:hidden">
            <div class="mx-auto max-w-6xl px-6 pb-4">
                <button class="w-full {{ $theme['accentBg'] }} text-slate-900 font-bold py-4 rounded-2xl shadow-xl">
                    Book {{ $title }} Now
                </button>
            </div>
        </div>

        <div class="hidden md:block pb-16">
            <div class="max-w-6xl mx-auto px-6 lg:px-8">
                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ route('flights.index') }}" class="px-8 py-4 {{ $theme['accentBg'] }} text-slate-900 font-bold rounded-xl shadow-lg">
                        Book {{ $title }} Now
                    </a>
                    <a href="{{ route('home') }}" class="px-6 py-3 rounded-xl border border-white/20 text-sm font-semibold text-white transition hover:bg-white/10">
                        Return to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
