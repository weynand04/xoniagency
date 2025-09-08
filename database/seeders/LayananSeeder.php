<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services_pages')->insert([
            // Hero Section
            'hero_h1' => 'Layanan',
            'hero_h2' => 'What We Offer',
            'hero_p'  => null,

            // Section 1: What We Offer (3 Cards)
            'sec1_h2' => 'What We Offer',
            'sec1_cards' => json_encode([
                [
                    'title' => 'BUSINESS PROGRESS',
                    'description' => 'Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus...',
                    'icon' => '<svg>...</svg>'
                ],
                [
                    'title' => 'BUSINESS STRATEGY',
                    'description' => 'Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus...',
                    'icon' => '<svg>...</svg>'
                ],
                [
                    'title' => 'MARKETING SOLUTION',
                    'description' => 'Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus...',
                    'icon' => '<svg>...</svg>'
                ],
            ]),

            // Section 2: How We Plan Our Work
            'sec2_h2' => 'HOW WE PLAN OUR WORK',
            'sec2_p'  => 'Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus...',
            'sec2_cards' => json_encode([
                [
                    'step' => '01',
                    'title' => 'RESEARCH & PLANNING',
                    'description' => 'Curabitur ullamcorper ultricies nisi. Nam eget dui...'
                ],
                [
                    'step' => '02',
                    'title' => 'IMPLEMENTATION',
                    'description' => 'Curabitur ullamcorper ultricies nisi. Nam eget dui...'
                ],
                [
                    'step' => '03',
                    'title' => 'REVIEW & LAUNCH',
                    'description' => 'Curabitur ullamcorper ultricies nisi. Nam eget dui...'
                ],
            ]),

            // Section 3: Skills & Expertise
            'sec3_h2' => 'SKILLS & EXPERTISE',
            'sec3_p'  => 'Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus...',
            'sec3_skills' => json_encode([
                ['name' => 'Web Designer', 'percentage' => 88],
                ['name' => 'Motion Graphic', 'percentage' => 88],
                ['name' => 'Expertise', 'percentage' => 88],
                ['name' => 'Marketing', 'percentage' => 100],
                ['name' => 'Progress', 'percentage' => 88],
            ]),

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
