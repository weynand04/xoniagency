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
