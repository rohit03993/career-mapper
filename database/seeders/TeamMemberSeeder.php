<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'Shruti Sharma',
                'position' => "Founder & Cheif Assessment Officer\nICCC Certified Career Coach",
                'image' => 'https://i.pravatar.cc/150?img=47',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Dr. Toshendra Dwivedi',
                'position' => 'Cheif Psychologist, Professor of Psychology, Alliance University',
                'image' => 'https://i.pravatar.cc/150?img=33',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Ritesh Jain',
                'position' => 'Cheif Strategy Expert, Harvard Alumunus, Director at AaptPrep',
                'image' => 'https://i.pravatar.cc/150?img=13',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Dr. Sanjay Singh',
                'position' => 'Mentor & Coach, Senior Psychologist, Dayalbagh university, Agra',
                'image' => 'https://i.pravatar.cc/150?img=51',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Neeraj Pradhan',
                'position' => 'Cheif Strategic Officer, Ex Air- Force Officer',
                'image' => 'https://i.pravatar.cc/150?img=27',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'DR. Sima Singh',
                'position' => 'Director, Delhi School of Professional Studies And Research, IPU',
                'image' => 'https://i.pravatar.cc/150?img=45',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'DR. Chandra Shekhar Tripathi',
                'position' => 'Assistant Professor Sanskrit Department Motilal Nehru College',
                'image' => 'https://i.pravatar.cc/150?img=60',
                'order' => 7,
                'is_active' => true,
            ],
        ];

        foreach ($members as $memberData) {
            TeamMember::firstOrCreate(
                ['name' => $memberData['name']],
                $memberData
            );
        }
    }
}