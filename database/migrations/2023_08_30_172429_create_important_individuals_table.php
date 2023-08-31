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
        Schema::create('important_individuals', function (Blueprint $table) {
            $table->id();
            $table->string('person_image')->nullable();
            $table->string('person_name')->nullable();
            $table->string('person_signiture')->nullable();
            $table->text('person_words')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('important_individuals');
    }
};
