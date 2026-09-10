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
        Schema::create('seo_settings', function (Blueprint $table) {
            $table->id();
            $table->string('route_name')->unique();
            $table->string('title_en')->nullable();
            $table->string('title_fa')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_fa')->nullable();
            $table->string('keywords_en')->nullable();
            $table->string('keywords_fa')->nullable();
            $table->string('og_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_settings');
    }
};
