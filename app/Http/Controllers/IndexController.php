<?php

namespace App\Http\Controllers;

use App\Models\Index;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function edit()
    {
        // Ambil data index, kalau belum ada, buat kosong dulu
        $index = Index::firstOrCreate([], []);

        return view('index-edit', compact('index'));
    }

    public function update(Request $request)
    {
        $index = Index::first();

        $data = $request->all();

        // Simpan array sebagai json
        $data['sec2_cards'] = json_encode($request->input('sec2_cards'));
        $data['sec4_cards'] = json_encode($request->input('sec4_cards'));
        $data['sec5_cards'] = json_encode($request->input('sec5_cards'));
        $data['sec6_cards'] = json_encode($request->input('sec6_cards'));
        $data['sec7_cards'] = json_encode($request->input('sec7_cards'));
        $data['sec8_cards'] = json_encode($request->input('sec8_cards'));

        $index->update($data);

        return redirect()->back()->with('success', 'Berhasil diperbarui!');
    }
}
