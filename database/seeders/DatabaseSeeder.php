<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            AboutUsSeeder::class,
            WhyUsSeeder::class,
            FeatureSeeder::class,
            ClientSeeder::class,
            ServiceSeeder::class,
            PortfolioCategorySeeder::class,
            PortfolioItemSeeder::class,
            TeamMemberSeeder::class,
            TestPageSeeder::class,
            TestimonialSeeder::class,
            ContactInfoSeeder::class,
            WhyChooseUsSeeder::class,
        ]);
    }
}
