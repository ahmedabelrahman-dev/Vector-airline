<x-app-layout>
	<section class="relative overflow-hidden min-h-[60vh] lg:min-h-[68vh]" x-data="{
        index: 0,
        timer: null,
		slides: [
			{ image: 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=2000&q=80', label: 'Above the clouds' },
			{ image: 'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&w=2000&q=80', label: 'Runway departure' },
			{ image: 'https://images.unsplash.com/photo-1529070538774-1843cb3265df?auto=format&fit=crop&w=2000&q=80', label: 'Cabin experience' },
			{ image: 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=2000&q=80', label: 'Golden hour flight' },
		],
        next() { this.index = (this.index + 1) % this.slides.length; },
        prev() { this.index = (this.index - 1 + this.slides.length) % this.slides.length; },
        go(i) { this.index = i; }
    }"
    x-init="timer = setInterval(() => next(), 6000)"
    @mouseenter="clearInterval(timer)"
    @mouseleave="timer = setInterval(() => next(), 6000)"
    >
		<style>
            [x-cloak] { display: none !important; }
        </style>
		<div class="absolute inset-0" aria-hidden="true">
			<template x-for="(slide, i) in slides" :key="slide.image">
				<div class="absolute inset-0"
					 x-cloak
					 x-show="index === i"
					 x-transition.opacity.duration.900ms
					 :style="`background-image: url('${slide.image}')`"
					 style="background-size: 100% 100%; background-position: center; background-repeat: no-repeat;">
				</div>
			</template>
		</div>
		<div class="absolute inset-0 bg-base/80 mix-blend-multiply"></div>

		<button type="button" @click="prev()" class="absolute left-4 top-1/2 z-20 -translate-y-1/2 rounded-full border border-white/20 bg-white/10 p-3 text-white backdrop-blur transition hover:bg-white/20" aria-label="Previous slide">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 18l-6-6 6-6" />
            </svg>
        </button>
		<button type="button" @click="next()" class="absolute right-4 top-1/2 z-20 -translate-y-1/2 rounded-full border border-white/20 bg-white/10 p-3 text-white backdrop-blur transition hover:bg-white/20" aria-label="Next slide">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 18l6-6-6-6" />
            </svg>
        </button>

		<div class="relative mx-auto max-w-7xl px-4 pb-28 pt-24 sm:px-6 lg:px-8">
			<div class="max-w-3xl space-y-6">
				<p class="text-sm uppercase tracking-[0.3em] text-slate-200">Elevate every journey</p>
				<h1 class="text-4xl font-semibold leading-tight text-white sm:text-5xl">Where to Next?</h1>
				<p class="text-lg text-slate-200">Curated routes, seamless connections, and premium comfort in the sky.</p>
			</div>

			<div class="relative z-20 mt-10 -mb-16 rounded-3xl border border-white/40 bg-white/90 p-6 text-slate-900 shadow-2xl backdrop-blur">
				<livewire:flight-search />
			</div>
		</div>
	</section>

	<section class="bg-slate-50 pb-20 pt-24 text-slate-900">
		<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
			<div class="flex items-center justify-between">
				<div>
					<p class="text-sm font-semibold uppercase tracking-[0.2em] text-primary">Offers</p>
					<h2 class="text-2xl font-semibold text-slate-900">Limited-time flight deals</h2>
				</div>
				<a href="{{ route('flights.index') }}" class="hidden rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-slate-300 hover:text-slate-900 md:inline-flex">View all offers</a>
			</div>

			<div class="mt-6 flex gap-4 overflow-x-auto pb-4 md:grid md:grid-cols-3 md:overflow-visible">
				@foreach ([
					['title' => 'Limited Time', 'subtitle' => 'Skyline escape to Dubai', 'tag' => 'Save 20%'],
					['title' => 'Family Discount', 'subtitle' => '15% off for 3+ travelers', 'tag' => 'Family Discount'],
					['title' => 'Weekend Hopper', 'subtitle' => 'City breaks under $299', 'tag' => 'Flash Deal'],
				] as $offer)
					<div class="min-w-[260px] rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
						<span class="inline-flex items-center rounded-full bg-highlight/10 px-3 py-1 text-xs font-semibold text-highlight">{{ $offer['tag'] }}</span>
						<h3 class="mt-4 text-lg font-semibold text-slate-900">{{ $offer['title'] }}</h3>
						<p class="mt-2 text-sm text-slate-600">{{ $offer['subtitle'] }}</p>
					</div>
				@endforeach
			</div>
		</div>
	</section>

	<section class="bg-white pb-24">
		<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
			<div class="flex items-end justify-between gap-6">
				<div>
					<p class="text-sm font-semibold uppercase tracking-[0.2em] text-primary">Popular Destinations</p>
					<h2 class="mt-2 font-display text-3xl font-semibold text-slate-900 sm:text-4xl">Curated for the bold</h2>
				</div>
				<a href="{{ route('flights.index') }}" class="hidden rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-slate-300 hover:text-slate-900 md:inline-flex">Explore all</a>
			</div>

			<div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
				@foreach ([
					['city' => 'Paris', 'price' => 'Starting from $420', 'image' => 'https://images.unsplash.com/photo-1502602898657-3e91760cbb34?auto=format&fit=crop&w=1200&q=80'],
					['city' => 'Tokyo', 'price' => 'Starting from $540', 'image' => 'https://images.unsplash.com/photo-1503899036084-c55cdd92da26?auto=format&fit=crop&w=1200&q=80'],
					['city' => 'Cape Town', 'price' => 'Starting from $380', 'image' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=1200&q=80'],
					['city' => 'Santorini', 'price' => 'Starting from $310', 'image' => 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1200&q=80'],
					['city' => 'New York', 'price' => 'Starting from $450', 'image' => 'https://images.unsplash.com/photo-1496588152823-e2d3ed1ee488?auto=format&fit=crop&w=1200&q=80'],
					['city' => 'Singapore', 'price' => 'Starting from $470', 'image' => 'https://images.unsplash.com/photo-1505761671935-60b3a7427bad?auto=format&fit=crop&w=1200&q=80'],
				] as $destination)
					<a href="{{ route('flights.index') }}" class="group overflow-hidden rounded-3xl border border-slate-200 bg-slate-50 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
						<div class="relative h-72 overflow-hidden">
							<img src="{{ $destination['image'] }}" alt="{{ $destination['city'] }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
							<div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent"></div>
							<div class="absolute bottom-4 left-4 right-4 text-white">
								<p class="text-xs uppercase tracking-[0.25em] text-slate-200">Destination</p>
								<h3 class="mt-2 text-2xl font-semibold">{{ $destination['city'] }}</h3>
								<p class="mt-1 text-sm text-slate-200">{{ $destination['price'] }}</p>
							</div>
						</div>
						<div class="bg-white p-4 text-sm text-slate-600">Polaroid vibes with premium stays and curated flight windows.</div>
					</a>
				@endforeach
			</div>
		</div>
	</section>

	<section class="relative overflow-hidden bg-base py-20">
		<div class="absolute inset-0">
			<div class="absolute -top-24 -left-24 h-96 w-96 rounded-full bg-primary/30 blur-[120px]"></div>
			<div class="absolute top-1/3 right-0 h-80 w-80 rounded-full bg-accent/20 blur-[140px]"></div>
		</div>

		<div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
			<div class="text-center mb-16">
				<p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-300">Experience</p>
				<h2 class="mt-3 text-3xl font-semibold text-white sm:text-4xl">Choose your comfort level</h2>
				<p class="mt-4 text-lg text-slate-300">Tap a cabin class to explore features, reviews, and curated perks.</p>
			</div>

			<div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
				<!-- Economy -->
				<a href="{{ route('experience.show', 'economy') }}" class="group relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-lg transition hover:-translate-y-1 hover:border-white/20">
					<div class="absolute inset-0 bg-gradient-to-br from-slate-900/40 via-transparent to-transparent opacity-0 transition group-hover:opacity-100"></div>
					<div class="h-48 w-full overflow-hidden">
						<img class="h-full w-full object-cover transition duration-500 group-hover:scale-105" src="https://images.unsplash.com/photo-1762960246763-dcb1e92b0b58?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8ZWNvbm9teSUyMGNsYXNzfGVufDB8fDB8fHww" alt="Economy Class">
					</div>
					<div class="p-6">
						<div class="flex items-center justify-between">
							<h3 class="text-2xl font-semibold text-white">Economy</h3>
							<span class="rounded-full bg-accent/20 px-3 py-1 text-xs font-semibold text-accent">Best Value</span>
						</div>
						<ul class="mt-4 space-y-2 text-sm text-slate-300">
							<li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-accent"></span>Ergonomic Seating</li>
							<li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-accent"></span>Standard Meals</li>
							<li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-accent"></span>Free Wi-Fi (1h)</li>
						</ul>
						<div class="mt-6 flex items-end justify-between">
							<div>
								<p class="text-xs uppercase text-slate-400">From</p>
								<p class="text-3xl font-semibold text-white">$499</p>
							</div>
							<span class="rounded-full border border-white/10 px-4 py-2 text-xs text-slate-300">Explore →</span>
						</div>
					</div>
				</a>

				<!-- Business -->
				<a href="{{ route('experience.show', 'business') }}" class="group relative overflow-hidden rounded-3xl border border-white/20 bg-white/10 shadow-2xl transition hover:-translate-y-1 hover:border-white/30">
					<div class="absolute top-4 right-4 rounded-full bg-warning px-3 py-1 text-xs font-semibold text-white">Popular</div>
					<div class="h-48 w-full overflow-hidden">
						<img class="h-full w-full object-cover transition duration-500 group-hover:scale-105" src="https://plus.unsplash.com/premium_photo-1661901904284-4767adf0a8fe?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8YnVpc25lc3MlMjBhaXJsaW5lfGVufDB8fDB8fHww" alt="Business Class">
					</div>
					<div class="p-6">
						<div class="flex items-center justify-between">
							<h3 class="text-2xl font-semibold text-white">Business</h3>
							<span class="rounded-full bg-slate-100/10 px-3 py-1 text-xs font-semibold text-slate-200">Most Comfort</span>
						</div>
						<ul class="mt-4 space-y-2 text-sm text-slate-200">
							<li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-slate-200"></span>Extra Legroom & Recline</li>
							<li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-slate-200"></span>Gourmet Dining</li>
							<li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-slate-200"></span>Priority Boarding</li>
						</ul>
						<div class="mt-6 flex items-end justify-between">
							<div>
								<p class="text-xs uppercase text-slate-400">From</p>
								<p class="text-3xl font-semibold text-white">$1,299</p>
							</div>
							<span class="rounded-full border border-white/10 px-4 py-2 text-xs text-slate-300">Explore →</span>
						</div>
					</div>
				</a>

				<!-- First Class -->
				<a href="{{ route('experience.show', 'first') }}" class="group relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-lg transition hover:-translate-y-1 hover:border-white/20">
					<div class="h-48 w-full overflow-hidden">
						<img class="h-full w-full object-cover transition duration-500 group-hover:scale-105" src="https://plus.unsplash.com/premium_photo-1682096459254-781ef26d33f8?q=80&w=2340&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="First Class">
					</div>
					<div class="p-6">
						<div class="flex items-center justify-between">
							<h3 class="text-2xl font-semibold text-white">First Class</h3>
							<span class="rounded-full bg-amber-400/20 px-3 py-1 text-xs font-semibold text-amber-300">Elite Experience</span>
						</div>
						<ul class="mt-4 space-y-2 text-sm text-slate-300">
							<li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-amber-300"></span>Private Suite</li>
							<li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-amber-300"></span>A la Carte Menu</li>
							<li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-amber-300"></span>Chauffeur Service</li>
						</ul>
						<div class="mt-6 flex items-end justify-between">
							<div>
								<p class="text-xs uppercase text-slate-400">From</p>
								<p class="text-3xl font-semibold text-white">$3,499</p>
							</div>
							<span class="rounded-full border border-white/10 px-4 py-2 text-xs text-slate-300">Explore →</span>
						</div>
					</div>
				</a>
			</div>
		</div>
	</section>
</x-app-layout>


