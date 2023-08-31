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
        Schema::create('school_principles', function (Blueprint $table) {
            $table->id();
            $table->string('principle_image')->nullable();
            $table->string('principle_name')->nullable();
            $table->string('principle_signiture')->nullable();
            $table->text('principle_words')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_principles');
    }
};
