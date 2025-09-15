<?php

namespace App\Http\Controllers;

use App\Models\ServicesPage;
use Illuminate\Http\Request;

class LayananEditController extends Controller
{
    public function index()
    {
        $layananData = ServicesPage::firstOrCreate([], [
            'hero_h1' => '',
            'hero_h2' => '',
            'hero_p'  => '',
            'sec1_h2' => '',
            'sec1_cards' => [],
            'sec2_h2' => '',
            'sec2_p' => '',
            'sec2_cards' => [],
            'sec3_h2' => '',
            'sec3_p' => '',
            'sec3_skills' => [],
        ]);

        return view('layanan-edit', [
            'title' => 'Layanan Page',
            'activePage' => 'layanan-edit',
            'layananData' => $layananData
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'hero_h1' => 'required|string|max:255',
            'sec1_h2' => 'required|string|max:255',
            'sec1_cards' => 'nullable|array',
            'sec2_h2' => 'required|string|max:255',
            'sec2_p' => 'nullable|string',
            'sec2_cards' => 'nullable|array',
            'sec3_h2' => 'required|string|max:255',
            'sec3_p' => 'nullable|string',
            'sec3_skills' => 'nullable|array',
        ]);

        // Simpan ke database (asumsikan model Page)
        $page = ServicesPage::first();
        $page->update([
            'hero_h1' => $data['hero_h1'],
            'sec1_h2' => $data['sec1_h2'],
            'sec1_cards' => $data['sec1_cards'],
            'sec2_h2' => $data['sec2_h2'],
            'sec2_p' => $data['sec2_p'],
            'sec2_cards' => $data['sec2_cards'],
            'sec3_h2' => $data['sec3_h2'],
            'sec3_p' => $data['sec3_p'],
            'sec3_skills' => $data['sec3_skills'],
        ]);

        return back()->with('success', 'Halaman berhasil diperbarui!');
    }
}
