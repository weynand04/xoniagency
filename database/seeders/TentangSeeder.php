<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tentang')->insert([
            // Hero Section
            [
                'key' => 'hero_section',
                'value' => json_encode([
                    'title' => 'About "Xoni Agency"',
                    'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet, doloribus deleniti.',
                    'image' => 'images/mainphoto.jpg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Skills
            [
                'key' => 'skills',
                'value' => json_encode([
                    ['name' => 'Web Designer', 'percentage' => 88],
                    ['name' => 'Motion Graphic', 'percentage' => 88],
                    ['name' => 'Expertise', 'percentage' => 88],
                    ['name' => 'Marketing', 'percentage' => 100],
                    ['name' => 'Progress', 'percentage' => 88],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Counters
            [
                'key' => 'counters',
                'value' => json_encode([
                    ['title' => 'Business Years', 'value' => 13],
                    ['title' => 'Worldwide Clients', 'value' => 6213],
                    ['title' => 'Our Team', 'value' => 55],
                    ['title' => 'Items Portfolio', 'value' => 344],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Pricing Plans
            [
                'key' => 'plans',
                'value' => json_encode([
                    [
                        'name' => 'Standard Plan',
                        'price' => 49.00,
                        'duration' => '/month',
                        'features' => [
                            '2 team members' => true,
                            '20GB Cloud storage' => true,
                            'Integration help' => true,
                            'Sketch Files' => false,
                            'API Access' => false,
                            'Complete documentation' => false,
                            '24×7 phone & email support' => false,
                        ],
                    ],
                    [
                        'name' => 'Pro Plan',
                        'price' => 99.00,
                        'duration' => '/month',
                        'features' => [
                            '5 team members' => true,
                            '100GB Cloud storage' => true,
                            'Integration help' => true,
                            'Sketch Files' => true,
                            'API Access' => true,
                            'Complete documentation' => false,
                            '24×7 phone & email support' => false,
                        ],
                    ],
                    [
                        'name' => 'Enterprise Plan',
                        'price' => 199.00,
                        'duration' => '/month',
                        'features' => [
                            'Unlimited team members' => true,
                            '1TB Cloud storage' => true,
                            'Integration help' => true,
                            'Sketch Files' => true,
                            'API Access' => true,
                            'Complete documentation' => true,
                            '24×7 phone & email support' => true,
                        ],
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
