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
        Schema::create('theme_settings', function (Blueprint $table) {
            $table->id();
            
            // Only one active theme at a time
            $table->boolean('is_active')->default(true);
            
            // Preset name (null if custom)
            $table->string('preset_name')->nullable();
            
            // Core Colors (always visible in admin)
            $table->string('primary_color', 7)->default('#FFC107');      // Main brand color (buttons, links, highlights)
            $table->string('secondary_color', 7)->default('#000000');    // Accent color
            $table->string('background_color', 7)->default('#FFFFFF');   // Page background
            $table->string('text_color', 7)->default('#333333');         // Main body text
            
            // Advanced Colors (expandable section in admin)
            $table->string('header_bg', 7)->default('#000000');          // Header background
            $table->string('header_text', 7)->default('#FFFFFF');        // Header text color
            $table->string('footer_bg', 7)->default('#000000');          // Footer background
            $table->string('footer_text', 7)->default('#FFFFFF');        // Footer text color
            $table->string('button_text', 7)->nullable();                // Button text (null = auto-calculate)
            $table->string('card_bg', 7)->default('#FFFFFF');            // Card/section background
            $table->string('border_color', 7)->default('#E0E0E0');       // Border/divider color
            $table->string('icon_color', 7)->nullable();                 // Icon color (null = use primary)
            $table->string('link_color', 7)->nullable();                 // Link color (null = use primary)
            $table->string('link_hover_color', 7)->nullable();           // Link hover (null = darken primary)
            
            // Section backgrounds
            $table->string('section_bg_alt', 7)->default('#F8F9FA');     // Alternate section background
            
            // Hero section specific
            $table->string('hero_bg', 7)->default('#000000');            // Hero background
            $table->string('hero_text', 7)->default('#FFFFFF');          // Hero text
            $table->string('hero_gradient_start', 7)->default('#FFD700'); // Hero gradient start
            $table->string('hero_gradient_end', 7)->default('#000000');   // Hero gradient end
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_settings');
    }
};
