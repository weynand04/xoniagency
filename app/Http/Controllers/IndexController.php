<?php

namespace App\Http\Controllers;

use App\Models\Index;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class IndexController extends Controller
{
    public function index()
    {
        $indexData = Index::firstOrCreate([], [
            // ... inisialisasi default seperti semula ...
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
            // validasi lain...
            'sec6_cards' => 'nullable|array',
            'sec6_cards.*.h3' => 'nullable|string|max:255',
            'sec6_cards.*.p' => 'nullable|string',
            'sec6_cards.*.img' => 'nullable|file|image|mimes:jpg,jpeg,png,webp|max:2048',

            'sec7_cards' => 'nullable|array',
            'sec7_cards.*.feedback' => 'nullable|string',
            'sec7_cards.*.profile' => 'nullable|file|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sec7_cards.*.name' => 'nullable|string|max:255',
        ]);

        $index = Index::firstOrCreate([], []);

        // --- HANDLE SEC4 (sudah ada)
        $sec4_cards = $request->input('sec4_cards', []);
        $sec4_files = $request->file('sec4_cards', []);
        if (is_array($sec4_cards)) {
            foreach ($sec4_cards as $i => $card) {
                if (isset($sec4_files[$i]['image']) && $sec4_files[$i]['image'] instanceof UploadedFile) {
                    $oldPath = $index->sec4_cards[$i]['image'] ?? null;
                    if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                    $path = $sec4_files[$i]['image']->store('cards/sec4', 'public');
                    $sec4_cards[$i]['image'] = $path;
                }
            }
        }

        // --- HANDLE SEC6 (gambar img)
        $sec6_cards = $request->input('sec6_cards', []);
        $sec6_files = $request->file('sec6_cards', []);
        if (is_array($sec6_cards)) {
            foreach ($sec6_cards as $i => $card) {
                if (isset($sec6_files[$i]['img']) && $sec6_files[$i]['img'] instanceof UploadedFile) {
                    $oldPath = $index->sec6_cards[$i]['img'] ?? null;
                    if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                    $path = $sec6_files[$i]['img']->store('cards/sec6', 'public');
                    $sec6_cards[$i]['img'] = $path;
                }
            }
        }

        // --- HANDLE SEC7 (foto profile)
        $sec7_cards = $request->input('sec7_cards', []);
        $sec7_files = $request->file('sec7_cards', []);
        if (is_array($sec7_cards)) {
            foreach ($sec7_cards as $i => $card) {
                if (isset($sec7_files[$i]['profile']) && $sec7_files[$i]['profile'] instanceof UploadedFile) {
                    $oldPath = $index->sec7_cards[$i]['profile'] ?? null;
                    if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                    $path = $sec7_files[$i]['profile']->store('cards/sec7', 'public');
                    $sec7_cards[$i]['profile'] = $path;
                }
            }
        }

        // --- GABUNGKAN DATA
        $payload = array_merge($validated, [
            'sec2_cards' => $this->cleanCards($request->input('sec2_cards', []), ['title', 'description']),
            'sec4_cards' => $this->cleanCards($sec4_cards, ['title', 'image']),
            'sec5_cards' => $this->cleanCards($request->input('sec5_cards', []), ['count', 'h2']),
            'sec6_cards' => $this->cleanCards($sec6_cards, ['h3', 'p', 'img']),
            'sec7_cards' => $this->cleanCards($sec7_cards, ['feedback', 'profile', 'name']),
        ]);

        $index->update($payload);

        return redirect()->back()->with('success', 'Berhasil diperbarui!');
    }


    /**
     * Helper untuk membersihkan data cards — TIDAK MENGGUNAKAN $request
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
