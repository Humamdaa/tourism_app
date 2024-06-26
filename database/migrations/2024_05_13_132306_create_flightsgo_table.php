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
            Schema::create('flightsgo', function (Blueprint $table) {
                $table->id();
                $table->date('date');
                $table->time('takeoff');
                $table->time('landing');
                $table->time('duration');
                //all capacity
                $table->integer('capacity')->unsigned();
                $table->integer('NumStops')->default(0);

                $table->bigInteger('office_id')->unsigned();
                $table->bigInteger('from_city_id')->unsigned();
                $table->bigInteger('to_city_id')->unsigned();

                $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
                $table->foreign('from_city_id')->references('id')->on('cities')->onDelete('cascade');
                $table->foreign('to_city_id')->references('id')->on('cities')->onDelete('cascade');

                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flightsgo');
    }
};
