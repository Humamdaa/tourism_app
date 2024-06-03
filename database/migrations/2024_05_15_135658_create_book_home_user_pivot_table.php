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
        Schema::create('book_home_user_pivot', function (Blueprint $table) {
            $table->id();
            $table->enum('booking_status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->date('start');
            $table->date('end');
            $table->foreignId("home_id")->constrained("id")->on("homes")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("user_id")->constrained("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_home_user_pivot');
    }
};
