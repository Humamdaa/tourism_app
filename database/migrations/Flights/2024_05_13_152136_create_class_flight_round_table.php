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
        Schema::create('class_flight_round', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('capacity')->unsigned();
            $table->double('price');

            $table->bigInteger('class_id')->unsigned();
            $table->bigInteger('flightRound_id')->unsigned();

            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('flightRound_id')->references('id')->on('flightsround');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_flight_round');
    }
};
