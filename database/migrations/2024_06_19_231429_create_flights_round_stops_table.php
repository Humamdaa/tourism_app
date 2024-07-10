<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flights_round_stops', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('flightRound_id')->unsigned();
            $table->bigInteger('stop_id')->unsigned();

            $table->foreign('flightRound_id')->references('id')->on('flightsround')->onDelete('cascade');
            $table->foreign('stop_id')->references('id')->on('stops')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights_round_stops');
    }
};
