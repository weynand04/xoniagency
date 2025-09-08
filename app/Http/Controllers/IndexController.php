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
            'sec5_cards' => [],
            'sec6_h2' => '',
            'sec6_p' => '',
            'sec6_cards' => [],
            'sec7_h2' => '',
            'sec7_cards' => [],
        ]);

        return view('index-edit', [
            'title' => 'Beranda Page',
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

            'sec5_cards' => 'nullable|array',
            'sec5_cards.*.count' => 'nullable|string|max:255',
            'sec5_cards.*.h2' => 'nullable|string|max:255',

            'sec6_h2' => 'nullable|string|max:255',
            'sec6_p' => 'nullable|string',
            'sec6_cards' => 'nullable|array',
            'sec6_cards.*.h3' => 'nullable|string|max:255',
            'sec6_cards.*.p' => 'nullable|string',
            'sec6_cards.*.img' => 'nullable|string|max:255',

            'sec7_h2' => 'nullable|string|max:255',
            'sec7_cards' => 'nullable|array',
            'sec7_cards.*.feedback' => 'nullable|string',
            'sec7_cards.*.profile' => 'nullable|string|max:255',
            'sec7_cards.*.name' => 'nullable|string|max:255',
        ]);

        $index = Index::firstOrCreate([], []);

        $payload = array_merge($validated, [
            'sec2_cards' => $this->cleanCards($request->input('sec2_cards', []), ['title', 'description']),
            'sec4_cards' => $this->cleanCards($request->input('sec4_cards', []), ['title', 'image']),
            'sec5_cards' => $this->cleanCards($request->input('sec5_cards', []), ['count', 'h2']),
            'sec6_cards' => $this->cleanCards($request->input('sec6_cards', []), ['h3', 'p', 'img']),
            'sec7_cards' => $this->cleanCards($request->input('sec7_cards', []), ['feedback', 'profile', 'name']),
        ]);

        $index->update($payload);

        return redirect()->back()->with('success', 'Berhasil diperbarui!');
    }

    /**
     * Helper untuk membersihkan data cards
     */
    private function cleanCards(array $cards, array $fields): array
    {
        return collect($cards)
            ->map(fn($c) => collect($fields)->mapWithKeys(fn($f) => [$f => trim($c[$f] ?? '')])->all())
            ->filter(fn($c) => collect($c)->some(fn($v) => $v !== ''))
            ->values()
            ->all();
    }
}
