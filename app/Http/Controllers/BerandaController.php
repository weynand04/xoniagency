<?php

namespace App\Http\Controllers;

use App\Models\Index;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $indexData = Index::first();

        return view('index', [
            'title' => 'Xoni Agency - Beranda',
            'activePage' => 'beranda',
            'indexData' => $indexData
        ]);
    }
}
