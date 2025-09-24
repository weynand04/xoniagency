<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kontak')->insert([
            'whatsapp'   => '0815-2155-0913',
            'email'      => 'alanzagi@hotmail.com',
            'alamat'     => 'Jl. Kridasana No. 132 Kelurahan Pasiran',
            'jam_kerja'  => '08:00 - 20:00 WIB',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
