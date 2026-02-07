<x-app-layout>
    <div class="px-4 pb-16 pt-12 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-slate-300">Vector Air</p>
                    <h1 class="mt-2 text-3xl font-semibold text-white">Welcome back</h1>
                    <p class="mt-2 text-slate-300">Manage your trips, rewards, and flight activity at a glance.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('flights.index') }}" class="rounded-xl bg-primary px-5 py-2 text-sm font-semibold text-white shadow-lg shadow-primary/30 transition hover:bg-primary/90">Book a flight</a>
                    <a href="{{ route('flights.status') }}" class="rounded-xl border border-white/20 px-5 py-2 text-sm font-semibold text-white transition hover:bg-white/10">Check status</a>
                </div>
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                    <p class="text-xs uppercase tracking-[0.2em] text-slate-300">Upcoming Trips</p>
                    <p class="mt-3 text-3xl font-semibold text-white">2</p>
                    <p class="mt-2 text-sm text-slate-400">Next departure in 5 days</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                    <p class="text-xs uppercase tracking-[0.2em] text-slate-300">Reward Miles</p>
                    <p class="mt-3 text-3xl font-semibold text-white">38,420</p>
                    <p class="mt-2 text-sm text-slate-400">Redeemable across 120 routes</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                    <p class="text-xs uppercase tracking-[0.2em] text-slate-300">Saved Passengers</p>
                    <p class="mt-3 text-3xl font-semibold text-white">3</p>
                    <p class="mt-2 text-sm text-slate-400">Family profiles ready to book</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                    <p class="text-xs uppercase tracking-[0.2em] text-slate-300">Status Tier</p>
                    <p class="mt-3 text-3xl font-semibold text-white">Sky Elite</p>
                    <p class="mt-2 text-sm text-slate-400">Upgrade perks unlocked</p>
                </div>
            </div>

            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                <div class="rounded-3xl border border-white/10 bg-white/5 p-6 lg:col-span-2">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-white">Your next journey</h2>
                        <span class="rounded-full bg-emerald-400/10 px-3 py-1 text-xs font-semibold text-emerald-200">Confirmed</span>
                    </div>
                    <div class="mt-6 grid gap-4 sm:grid-cols-3">
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-slate-300">From</p>
                            <p class="mt-2 text-xl font-semibold text-white">DXB</p>
                            <p class="text-sm text-slate-400">Dubai</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-slate-300">To</p>
                            <p class="mt-2 text-xl font-semibold text-white">LHR</p>
                            <p class="text-sm text-slate-400">London</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-slate-300">Departure</p>
                            <p class="mt-2 text-xl font-semibold text-white">Feb 16</p>
                            <p class="text-sm text-slate-400">09:45 AM</p>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <button class="rounded-xl bg-white/10 px-4 py-2 text-sm font-semibold text-white transition hover:bg-white/20">View itinerary</button>
                        <button class="rounded-xl border border-white/20 px-4 py-2 text-sm font-semibold text-white transition hover:bg-white/10">Manage seats</button>
                    </div>
                </div>

                <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                    <h2 class="text-lg font-semibold text-white">Quick actions</h2>
                    <div class="mt-6 space-y-4">
                        <a href="{{ route('flights.index') }}" class="flex items-center justify-between rounded-2xl border border-white/10 bg-white/5 p-4 text-sm text-slate-200 transition hover:bg-white/10">
                            <span>Search flights</span>
                            <span>→</span>
                        </a>
                        <a href="{{ route('experience.show', 'business') }}" class="flex items-center justify-between rounded-2xl border border-white/10 bg-white/5 p-4 text-sm text-slate-200 transition hover:bg-white/10">
                            <span>Explore Business Class</span>
                            <span>→</span>
                        </a>
                        <a href="{{ route('flights.status') }}" class="flex items-center justify-between rounded-2xl border border-white/10 bg-white/5 p-4 text-sm text-slate-200 transition hover:bg-white/10">
                            <span>Track a flight</span>
                            <span>→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
