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
        Schema::create('meritorious_students', function (Blueprint $table) {
            $table->id();
            $table->integer('position')->nullable();
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('study_period');
            $table->text('merits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meritorious_students');
    }
};
