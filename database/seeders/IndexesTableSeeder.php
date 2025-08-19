<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndexesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('indexes')->insert([
            // Main Section
            'main_h1' => 'Selamat Datang di Website Kami',
            'main_h2' => 'Solusi Digital untuk Bisnis Anda',
            'main_p' => 'Kami menyediakan layanan terbaik untuk membantu bisnis Anda berkembang.',
            'main_button_text' => 'Pelajari Lebih Lanjut',
            'main_button_link' => '/about',

            // Section 2 (3 card)
            'sec2_h2' => 'Layanan Unggulan',
            'sec2_p' => 'Berbagai layanan yang kami tawarkan untuk memenuhi kebutuhan Anda.',
            'sec2_cards' => json_encode([
                ['title' => 'Desain Web', 'description' => 'Desain modern dan responsif.'],
                ['title' => 'Pengembangan Aplikasi', 'description' => 'Aplikasi yang cepat dan aman.'],
                ['title' => 'SEO & Marketing', 'description' => 'Optimasi website agar mudah ditemukan.']
            ]),

            // Section 3
            'sec3_h2' => 'Bekerja Bersama Kami',
            'sec3_p' => 'Kami percaya kolaborasi membawa hasil terbaik.',
            'sec3_button_text' => 'Hubungi Kami',
            'sec3_button_link' => '/contact',

            // Section 4 (4 card)
            'sec4_h2' => 'Portofolio Kami',
            'sec4_p' => 'Beberapa proyek yang telah kami selesaikan.',
            'sec4_button_text' => 'Lihat Semua Proyek',
            'sec4_button_link' => '/portfolio',
            'sec4_cards' => json_encode([
                ['title' => 'Proyek A', 'image' => '/images/project-a.jpg'],
                ['title' => 'Proyek B', 'image' => '/images/project-b.jpg'],
                ['title' => 'Proyek C', 'image' => '/images/project-c.jpg'],
                ['title' => 'Proyek D', 'image' => '/images/project-d.jpg'],
            ]),

            // Section 5 (4 card berisi h2 dan p)
            'sec5_cards' => json_encode([
                ['h2' => 'Kecepatan', 'p' => 'Proses kerja yang efisien dan cepat.', 'count' => 100],
                ['h2' => 'Kualitas', 'p' => 'Hasil pekerjaan berkualitas tinggi.', 'count' => 110],
                ['h2' => 'Inovasi', 'p' => 'Selalu mengikuti perkembangan teknologi.', 'count' => 100],
                ['h2' => 'Dukungan', 'p' => 'Layanan support 24/7.', 'count' => 120]
            ]),

            // Section 6 (4 card img, h3, p)
            'sec6_h2' => 'Tim Kami',
            'sec6_p' => 'Berpengalaman dan berdedikasi.',
            'sec6_cards' => json_encode([
                ['img' => '/images/team1.jpg', 'h3' => 'John Doe', 'p' => 'CEO & Founder'],
                ['img' => '/images/team2.jpg', 'h3' => 'Jane Smith', 'p' => 'CTO'],
                ['img' => '/images/team3.jpg', 'h3' => 'Michael Lee', 'p' => 'Lead Designer'],
                ['img' => '/images/team4.jpg', 'h3' => 'Sarah Johnson', 'p' => 'Marketing Manager'],
            ]),

            // Section 7
            'sec7_h2' => 'Testimoni Klien',
            'sec7_p' => 'Apa kata mereka tentang kami.',
            'sec7_button_text' => 'Lihat Semua Testimoni',
            'sec7_cards' => json_encode([
                ['name' => 'Andi', 'feedback' => 'Pelayanan cepat dan profesional.', 'profile' => '/images/team1.jpg'],
                ['name' => 'Budi', 'feedback' => 'Hasil desain sangat memuaskan.', 'profile' => '/images/team1.jpg'],
                ['name' => 'Citra', 'feedback' => 'Tim yang ramah dan membantu.', 'profile' => '/images/team1.jpg']
            ]),

            // Section 8 (3 card)
            'sec8_h2' => 'Artikel Terbaru',
            'sec8_cards' => json_encode([
                ['title' => 'Tips Meningkatkan Bisnis Online', 'link' => '/blog/tips-bisnis-online'],
                ['title' => 'Tren Desain Web 2025', 'link' => '/blog/tren-desain-web-2025'],
                ['title' => 'Pentingnya SEO di Era Digital', 'link' => '/blog/seo-era-digital']
            ]),

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
