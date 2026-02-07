<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Vector Air') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&family=playfair-display:600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-base text-white">
        <x-banner />

        <div class="min-h-screen">
            <header class="fixed top-0 inset-x-0 z-50">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <nav class="mt-4 flex items-center justify-between rounded-2xl border border-white/10 bg-base/70 px-5 py-3 shadow-lg backdrop-blur">
                        <a href="{{ route('home') }}" class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/20 text-primary">
                                <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 11l18-6-6 18-3-7-9-5z" />
                                    <path d="M12 14l3 3" />
                                </svg>
                            </div>
                            <span class="text-lg font-bold tracking-wide">Vector Air</span>
                        </a>

                        <div class="hidden items-center gap-6 text-sm font-medium text-slate-200 lg:flex">
                            @auth
                                <a href="{{ route('dashboard') }}" class="transition hover:text-white">Dashboard</a>
                            @endauth
                            <a href="{{ route('flights.index') }}" class="transition hover:text-white">My Bookings</a>
                            <a href="{{ route('flights.status') }}" class="transition hover:text-white">Help</a>
                        </div>

                        <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 px-3 py-2">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ route('profile.show') }}" class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-200 transition hover:text-white">Profile</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-200 transition hover:text-white">Logout</button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-200 transition hover:text-white">Sign In</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="rounded-xl border border-white/20 px-4 py-2 text-sm font-semibold text-white transition hover:bg-white/10">Register</a>
                                    @endif
                                @endauth
                            @endif
                            <a href="{{ route('flights.index') }}" class="rounded-xl bg-primary px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-primary/30 transition hover:bg-primary/90">Book Now</a>
                        </div>
                    </nav>
                </div>
            </header>

            <main class="pt-24">
                {{ $slot }}
            </main>

            <footer class="bg-base text-slate-200">
                <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
                    <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/20 text-primary">
                                    <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 11l18-6-6 18-3-7-9-5z" />
                                        <path d="M12 14l3 3" />
                                    </svg>
                                </div>
                                <span class="text-lg font-bold">Vector Air</span>
                            </div>
                            <p class="text-sm text-slate-400">Premium connections and curated travel experiences across the globe.</p>
                            <div class="flex gap-3">
                                <a href="#" class="rounded-full bg-white/10 p-2 text-slate-200 transition hover:bg-white/20">
                                    <span class="sr-only">Facebook</span>
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12a10 10 0 10-11.5 9.9v-7H8v-3h2.5V9.5a3.5 3.5 0 013.7-3.9c1 0 2.1.2 2.1.2v2.3h-1.2c-1.2 0-1.6.8-1.6 1.5V11H17l-.5 3H13.5v7A10 10 0 0022 12z"/></svg>
                                </a>
                                <a href="#" class="rounded-full bg-white/10 p-2 text-slate-200 transition hover:bg-white/20">
                                    <span class="sr-only">X</span>
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M18.4 2H21l-5.8 6.6L22 22h-6.3l-3.9-5.2L7 22H4.3l6.2-7.1L2 2h6.4l3.6 4.8L18.4 2zm-1.1 18h1.8L8.9 4H7.1l10.2 16z"/></svg>
                                </a>
                                <a href="#" class="rounded-full bg-white/10 p-2 text-slate-200 transition hover:bg-white/20">
                                    <span class="sr-only">Instagram</span>
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M7 3h10a4 4 0 014 4v10a4 4 0 01-4 4H7a4 4 0 01-4-4V7a4 4 0 014-4zm10 2H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2zm-5 3.5A4.5 4.5 0 1112 18a4.5 4.5 0 010-9zm0 2A2.5 2.5 0 1014.5 13 2.5 2.5 0 0012 10.5zm5-3a1 1 0 11-1 1 1 1 0 011-1z"/></svg>
                                </a>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-white">Company</h3>
                            <ul class="mt-4 space-y-3 text-sm text-slate-400">
                                <li><a href="#" class="transition hover:text-white">Careers</a></li>
                                <li><a href="#" class="transition hover:text-white">Press</a></li>
                                <li><a href="#" class="transition hover:text-white">Sustainability</a></li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-white">About Us</h3>
                            <ul class="mt-4 space-y-3 text-sm text-slate-400">
                                <li><a href="#" class="transition hover:text-white">Our Story</a></li>
                                <li><a href="#" class="transition hover:text-white">Fleet</a></li>
                                <li><a href="#" class="transition hover:text-white">Safety</a></li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-white">Support</h3>
                            <ul class="mt-4 space-y-3 text-sm text-slate-400">
                                <li><a href="#" class="transition hover:text-white">FAQs</a></li>
                                <li><a href="#" class="transition hover:text-white">Refund Policy</a></li>
                                <li><a href="#" class="transition hover:text-white">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-12 text-center text-xs text-slate-500">© 2026 Vector Air. All rights reserved.</div>
                </div>
            </footer>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
