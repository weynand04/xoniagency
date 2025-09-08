<?php

namespace App\Http\Controllers;

use App\Models\ServicesPage;

class LayananController extends Controller
{
    public function index()
    {
        // Ambil record pertama
        $page = ServicesPage::first();

        return view('layanan', [
            'title' => 'Xoni Agency - Layanan',
            'activePage' => 'layanan',
            'page' => $page
        ]);
    }
}
