<?php

namespace App\Http\Controllers;

use App\Models\Index;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class IndexController extends Controller
{
    public function index()
    {
        $indexData = Index::firstOrCreate([], [
            // nilai default opsional
            'main_h1' => '',
            'main_h2' => '',
            'main_p'  => '',
            'sec2_h2' => '',
            'sec2_p'  => '',
            'sec2_cards' => [], // penting: default array
        ]);

        return view('index-edit', [
            'title' => 'Xoni Agency - Beranda',
            'activePage' => 'index-edit',
            'indexData' => $indexData
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'main_h1' => 'required|string|max:255',
            'main_h2' => 'required|string|max:255',
            'main_p'  => 'nullable|string',
            'main_button_text' => 'nullable|string|max:255',
            'main_button_link' => 'nullable|string|max:255',

            'sec2_h2' => 'required|string|max:255',
            'sec2_p'  => 'required|string',

            // Validasi array cards (boleh kosong)
            'sec2_cards' => 'nullable|array',
            'sec2_cards.*.title' => 'nullable|string|max:255',
            'sec2_cards.*.description' => 'nullable|string',

            'sec3_h2' => 'nullable|string|max:255',
            'sec3_p' => 'nullable|string',
            'sec3_button_text' => 'nullable|string|max:255',
            'sec3_button_link' => 'nullable|string|max:255',
            'sec3_video_link' => 'nullable|string|max:255', // kalau mau ganti link video

        ]);

        // Bersihkan card kosong: kalau title & description sama-sama kosong, buang
        $cards = collect($request->input('sec2_cards', []))
            ->map(function ($c) {
                return [
                    'title' => trim($c['title'] ?? ''),
                    'description' => trim($c['description'] ?? ''),
                ];
            })
            ->filter(function ($c) {
                return $c['title'] !== '' || $c['description'] !== '';
            })
            ->values()
            ->all();

        $index = Index::firstOrCreate([], []);
        // Gabungkan validasi + cards bersih
        $payload = array_merge($validated, ['sec2_cards' => $cards]);

        $index->update($payload);

        return redirect()->back()->with('success', 'Berhasil diperbarui!');
    }
}
