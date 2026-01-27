<?php

namespace Database\Seeders;

use App\Models\ThemeSetting;
use Illuminate\Database\Seeder;

class ThemeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if a theme already exists
        if (ThemeSetting::count() > 0) {
            $this->command->info('Theme settings already exist. Skipping seeder.');
            return;
        }

        // Create default theme - use explicit values for all required fields
        ThemeSetting::create([
            'is_active' => true,
            'preset_name' => 'default',
            // Core colors
            'primary_color' => '#FFC107',
            'secondary_color' => '#000000',
            'background_color' => '#FFFFFF',
            'text_color' => '#333333',
            // Advanced colors - provide explicit defaults (auto-contrast will still work in CSS generation)
            'header_bg' => '#000000',
            'header_text' => '#FFFFFF',
            'footer_bg' => '#000000',
            'footer_text' => '#FFFFFF',
            'button_text' => '#000000',
            'card_bg' => '#FFFFFF',
            'border_color' => '#E0E0E0',
            'icon_color' => '#FFC107',
            'link_color' => '#FFC107',
            'link_hover_color' => '#E0A800',
            'section_bg_alt' => '#F8F9FA',
            // Hero section
            'hero_bg' => '#000000',
            'hero_text' => '#FFFFFF',
            'hero_gradient_start' => '#FFD700',
            'hero_gradient_end' => '#000000',
        ]);

        $this->command->info('Default theme settings created successfully.');
    }
}
