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
        Schema::create('user_flightsround', function (Blueprint $table) {
            $table->id();
            $table->integer('passenger');

            $table->bigInteger('class_id')->unsigned();
            $table->bigInteger('flightRound_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('flightRound_id')->references('id')->on('flightsround');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_flightsround');
    }
};
