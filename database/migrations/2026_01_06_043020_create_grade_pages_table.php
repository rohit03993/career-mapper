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
        Schema::create('grade_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('hero_title');
            $table->text('hero_subtitle');
            $table->text('hero_image')->nullable();
            $table->json('features')->nullable(); // Array of feature objects
            $table->string('button_text')->nullable();
            $table->text('feature_links')->nullable(); // JSON array of feature links
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_pages');
    }
};
