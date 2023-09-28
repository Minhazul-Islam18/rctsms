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
        Schema::create('site_notices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_notice_category_id')->constrained()->cascadeOnDelete();
            $table->integer('position')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_notices');
    }
};
