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
        Schema::create('institution_committees', function (Blueprint $table) {
            $table->id();
            $table->string('person_name')->nullable();
            $table->string('person_image')->nullable();
            $table->string('educational_qualification')->nullable();
            $table->string('identity')->nullable();
            $table->string('person_post')->nullable();
            $table->string('person_address')->nullable();
            $table->string('expired_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institution_committees');
    }
};
