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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("space");
            $table->string("location");
            $table->string("description");
            $table->unsignedInteger("monthly_rent");
            $table->unsignedInteger("person_num");
            $table->unsignedInteger("rooms");
            $table->unsignedInteger("baths");
            $table->foreignId('city_id')->constrained("cities")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
