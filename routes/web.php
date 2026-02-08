<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\FlightResults;
use App\Http\Controllers\ExperienceController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/flights', FlightResults::class)->name('flights.index');
Route::get('/status', App\Livewire\FlightStatus::class)->name('flights.status');
Route::get('/experience/{class}', [ExperienceController::class, 'show'])->name('experience.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
