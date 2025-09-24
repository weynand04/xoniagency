<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakEditController extends Controller
{
    public function index()
    {
        $kontakData = Kontak::firstOrCreate([], [
            'whatsapp' => '',
            'email' => '',
            'alamat' => '',
            'jam_kerja' => ''
        ]);

        return view('kontak-edit', [
            'title' => 'Layanan Page',
            'activePage' => 'kontak-edit',
            'kontakData' => $kontakData
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'whatsapp'   => 'nullable|string|max:20',
            'email'      => 'nullable|email|max:100',
            'alamat'     => 'nullable|string|max:255',
            'jam_kerja'  => 'nullable|string|max:50',
        ]);

        $kontak = Kontak::first(); // ambil data pertama
        if (!$kontak) {
            $kontak = new Kontak();
        }

        $kontak->update([
            'whatsapp'   => $request->whatsapp,
            'email'      => $request->email,
            'alamat'     => $request->alamat,
            'jam_kerja'  => $request->jam_kerja,
        ]);

        return redirect()->back()->with('success', 'Kontak berhasil diperbarui!');
    }
}
