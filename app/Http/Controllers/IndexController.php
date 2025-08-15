<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BerandaController;

use App\Models\Index;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        // Ambil data index, kalau belum ada, buat kosong dulu
        $indexData = Index::firstOrCreate([], []);

        return view('index-edit', [
            'title' => 'Xoni Agency - Beranda',
            'activePage' => 'index-edit',
            'indexData' => $indexData
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'main_h1' => 'required|string|max:255',
            'main_h2' => 'required|string|max:255',
            'main_p'  => 'nullable|string',
            'main_button_text' => 'nullable|string|max:255',
            'main_button_link' => 'nullable|string|max:255',
        ]);

        $index = Index::first();

        $data = $request->all();

        // Encode array menjadi JSON
        foreach (['sec2_cards', 'sec4_cards', 'sec5_cards', 'sec6_cards', 'sec7_cards', 'sec8_cards'] as $field) {
            if ($request->has($field)) {
                $data[$field] = json_encode($request->input($field));
            }
        }

        $index->update($data);

        return redirect()->back()->with('success', 'Berhasil diperbarui!');
    }
}
