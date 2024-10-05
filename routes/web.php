<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'title' => 'Xoni Agency - Beranda',
        'activePage' => 'index'
    ]);
});

Route::get('/tentang', function () {
    return view('tentang', [
        'title' => 'Xoni Agency - Tentang',
        'activePage' => 'tentang'
    ]);
});

Route::get('/layanan', function () {
    return view('layanan', [
        'title' => 'Xoni Agency - Layanan',
        'activePage' => 'layanan'
    ]);
});

Route::get('/kontak', function () {
    return view('kontak', [
        'title' => 'Xoni Agency - Kontak',
        'activePage' => 'kontak'
    ]);
});
