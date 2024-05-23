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
        Schema::create('home_feature_pivot', function (Blueprint $table) {
            $table->id();
            $table->foreignId("home_id")->constrained("id")->on("homes")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("feature_id")->constrained("id")->on("features")->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_feature_pivot');
    }
};
