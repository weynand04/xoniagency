<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentang;

class TentangEditController extends Controller
{
    public function index()
    {
        // Ambil semua data tentang dan simpan dalam array key-value
        $tentangData = Tentang::all()->keyBy('key');

        return view('tentang-edit', [
            'title' => 'Tentang Page',
            'activePage' => 'tentang-edit',
            'tentangData' => $tentangData
        ]);
    }

    public function update(Request $request)
    {
        // Update Hero Section
        Tentang::updateOrCreate(
            ['key' => 'hero_section'],
            ['value' => [
                'title' => $request->hero_title,
                'description' => $request->hero_description,
                'image' => $request->hero_image,
            ]]
        );

        // Update Skills
        Tentang::updateOrCreate(
            ['key' => 'skills'],
            ['value' => $request->skills ?? []]
        );

        // Update Counters
        Tentang::updateOrCreate(
            ['key' => 'counters'],
            ['value' => $request->counters ?? []]
        );

        // Update Pricing Plans
        Tentang::updateOrCreate(
            ['key' => 'plans'],
            ['value' => $request->plans ?? []]
        );

        return back()->with('success', 'Halaman berhasil diperbarui!');
    }
}
