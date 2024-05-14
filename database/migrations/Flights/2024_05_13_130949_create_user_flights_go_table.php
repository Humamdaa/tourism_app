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
        Schema::create('user_flights_go', function (Blueprint $table) {
            $table->id();
            $table->integer('passenger');

            $table->bigInteger('class_id')->unsigned();
            $table->bigInteger('flightGo_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('flightGo_id')->references('id')->on('flightsgo');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_flights_go');
    }
};
