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
            // ... semua rule validasi yang sudah kamu punya ...
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
            // catatan: validasi file nested
            'sec4_cards.*.image' => 'nullable|file|image|mimes:jpg,jpeg,png,webp|max:2048',

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

        /**
         * HANDLE UPLOADS SEC4
         * - Ambil input array sec4_cards (title + mungkin image path)
         * - Ambil file upload melalui $request->file('sec4_cards')
         * - Upload file yang ada dan simpan path ke array sec4_cards
         */
        $sec4_cards = $request->input('sec4_cards', []); // array input (judul + mungkin old path)
        $sec4_files = $request->file('sec4_cards', []); // array file (jika ada)

        if (is_array($sec4_cards)) {
            foreach ($sec4_cards as $i => $card) {
                // jika ada file upload pada indeks ini
                if (
                    isset($sec4_files[$i]) && is_array($sec4_files[$i]) && isset($sec4_files[$i]['image'])
                    && $sec4_files[$i]['image'] instanceof UploadedFile
                ) {

                    // optional: hapus file lama jika ada di DB (hindari menumpuk)
                    $oldPath = $index->sec4_cards[$i]['image'] ?? null;
                    if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }

                    // simpan file baru
                    $path = $sec4_files[$i]['image']->store('cards/sec4', 'public');
                    $sec4_cards[$i]['image'] = $path;
                } else {
                    // jika tidak ada file upload:
                    // - kalau user memasukkan path lama sebagai string, biarkan
                    // - kalau tidak, set jadi empty string supaya cleanCards bisa membersihkan
                    if (!isset($card['image']) || !is_string($card['image'])) {
                        $sec4_cards[$i]['image'] = '';
                    }
                }
            }
        }

        // siapkan payload gabungan (gunakan sec4_cards yang sudah diproses)
        $payload = array_merge($validated, [
            'sec2_cards' => $this->cleanCards($request->input('sec2_cards', []), ['title', 'description']),
            'sec4_cards' => $this->cleanCards($sec4_cards, ['title', 'image']),
            'sec5_cards' => $this->cleanCards($request->input('sec5_cards', []), ['count', 'h2']),
            'sec6_cards' => $this->cleanCards($request->input('sec6_cards', []), ['h3', 'p', 'img']),
            'sec7_cards' => $this->cleanCards($request->input('sec7_cards', []), ['feedback', 'profile', 'name']),
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
