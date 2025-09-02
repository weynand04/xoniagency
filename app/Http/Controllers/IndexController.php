<?php

namespace App\Http\Controllers;

use App\Models\Index;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $indexData = Index::firstOrCreate([], [
            'main_h1' => '',
            'main_h2' => '',
            'main_p'  => '',
            'main_button_text' => '',
            'main_button_link' => '',
            'sec2_h2' => '',
            'sec2_p'  => '',
            'sec2_cards' => [],
            'sec3_h2' => '',
            'sec3_p' => '',
            'sec3_button_text' => '',
            'sec3_button_link' => '',
            'sec3_video_link' => '',
            'sec4_h2' => '',
            'sec4_p' => '',
            'sec4_button_text' => '',
            'sec4_button_link' => '',
            'sec4_cards' => [],
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
            'sec2_cards' => 'nullable|array',
            'sec2_cards.*.title' => 'nullable|string|max:255',
            'sec2_cards.*.description' => 'nullable|string',

            'sec3_h2' => 'nullable|string|max:255',
            'sec3_p' => 'nullable|string',
            'sec3_button_text' => 'nullable|string|max:255',
            'sec3_button_link' => 'nullable|string|max:255',
            'sec3_video_link' => 'nullable|string|max:255',

            'sec4_h2' => 'nullable|string|max:255',
            'sec4_p' => 'nullable|string',
            'sec4_button_text' => 'nullable|string|max:255',
            'sec4_button_link' => 'nullable|string|max:255',
            'sec4_cards' => 'nullable|array',
            'sec4_cards.*.title' => 'nullable|string|max:255',
            'sec4_cards.*.image' => 'nullable|string|max:255',
        ]);

        // Bersihkan sec2_cards
        $sec2Cards = collect($request->input('sec2_cards', []))
            ->map(fn($c) => [
                'title' => trim($c['title'] ?? ''),
                'description' => trim($c['description'] ?? ''),
            ])
            ->filter(fn($c) => $c['title'] !== '' || $c['description'] !== '')
            ->values()
            ->all();

        // Bersihkan sec4_cards
        $sec4Cards = collect($request->input('sec4_cards', []))
            ->map(fn($c) => [
                'title' => trim($c['title'] ?? ''),
                'image' => trim($c['image'] ?? ''),
            ])
            ->filter(fn($c) => $c['title'] !== '' || $c['image'] !== '')
            ->values()
            ->all();

        $index = Index::firstOrCreate([], []);
        $payload = array_merge($validated, [
            'sec2_cards' => $sec2Cards,
            'sec4_cards' => $sec4Cards,
        ]);

        $index->update($payload);

        return redirect()->back()->with('success', 'Berhasil diperbarui!');
    }
}
