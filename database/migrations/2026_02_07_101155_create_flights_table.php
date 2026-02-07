<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number');
            $table->foreignId('airplane_id')->constrained();
            $table->foreignId('departure_airport_id')->constrained('airports');
            $table->foreignId('arrival_airport_id')->constrained('airports');
            $table->timestamp('departure_time')->index();
            $table->timestamp('arrival_time');
            $table->decimal('price', 8, 2);
            $table->timestamps();

            $table->index(['departure_airport_id', 'arrival_airport_id', 'departure_time'], 'flights_search_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
