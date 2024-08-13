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
        Schema::create('user_flights_round', function (Blueprint $table) {
            $table->id();
            $table->integer('passenger');
//            $table->string('seat_number')->unique()->nullabe();
            $table->boolean('taken')->default(0);
            $table->bigInteger('class_id')->unsigned();
            $table->bigInteger('flightRound_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('flightRound_id')->references('id')->on('flightsround')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_flights_round');
    }
};
