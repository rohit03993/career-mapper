<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            ['name' => 'Career Mapper', 'initials' => 'CM', 'order' => 1],
            ['name' => 'EduTech Solutions', 'initials' => 'EDU', 'order' => 2],
            ['name' => 'Guidance Connect', 'initials' => 'GC', 'order' => 3],
            ['name' => 'Career Success', 'initials' => 'CS', 'order' => 4],
            ['name' => 'Future Path', 'initials' => 'FP', 'order' => 5],
            ['name' => 'Student Care', 'initials' => 'SC', 'order' => 6],
        ];

        foreach ($clients as $client) {
            Client::create(array_merge($client, ['is_active' => true]));
        }
    }
}