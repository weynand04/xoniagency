<?php

namespace App\Http\Controllers;

use App\Models\Tentang;

class TentangController extends Controller
{
    public function index()
    {
        return view('tentang', [
            'title' => 'Xoni Agency - Tentang',
            'activePage' => 'tentang',

            // Ambil data berdasarkan key
            'hero' => Tentang::where('key', 'hero_section')->first(),
            'skills' => Tentang::where('key', 'skills')->first(),
            'counters' => Tentang::where('key', 'counters')->first(),
            'plans' => Tentang::where('key', 'plans')->first(),
        ]);
    }
}
