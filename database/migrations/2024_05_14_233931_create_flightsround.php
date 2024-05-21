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
        Schema::create('flightsround', function (Blueprint $table) {
            $table->id();
            $table->date('dateGo');
            $table->time('takeoffGo');
            $table->time('landingGo');
            $table->string('durationGo');
            $table->date('dateBack');
            $table->time('takeoffBack');
            $table->time('landingBack');
            $table->string('durationBack');
            $table->bigInteger('capacity');

            $table->bigInteger('office_id')->unsigned();
            $table->bigInteger('from_city_id')->unsigned();
            $table->bigInteger('to_city_id')->unsigned();

            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->foreign('from_city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('to_city_id')->references('id')->on('cities')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flightsround');
    }
};
