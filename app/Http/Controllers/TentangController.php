<?php

namespace App\Http\Controllers;

use App\Models\Tentang;

class TentangController extends Controller
{
    public function index()
    {
        $hero = Tentang::where('key', 'hero_section')->first();
        $skills = Tentang::where('key', 'skills')->first();
        $counters = Tentang::where('key', 'counters')->first();
        $plans = Tentang::where('key', 'plans')->first();

        return view('tentang', [
            'title'        => 'Xoni Agency - Tentang',
            'activePage'   => 'tentang',

            // JSON decode → Array
            'heroData'     => $hero->value ?? [],
            'skillsData'   => $skills->value ?? [],
            'countersData' => $counters->value ?? [],
            'plansData'    => $plans->value ?? [],
        ]);
    }
}
