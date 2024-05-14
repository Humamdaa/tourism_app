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
        Schema::create('book_room_hotel', function (Blueprint $table) {
            $table->id();
            $table->date('start');
            $table->date('end');
            $table->integer("persons")->unsigned();
            $table->bigInteger('id_room')->unsigned();
            $table->bigInteger('id_hotel')->unsigned();
            $table->bigInteger('id_user')->unsigned();

            $table->foreign('id_room')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_hotel')->references('id')->on('hotels')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_room_hotel');
    }
};
