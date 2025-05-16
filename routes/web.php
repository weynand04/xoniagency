<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'title' => 'Noken Soft - Beranda',
        'activePage' => 'index'
    ]);
});

Route::get('/tentang', function () {
    return view('tentang', [
        'title' => 'Noken Soft - Tentang',
        'activePage' => 'tentang'
    ]);
});

Route::get('/layanan', function () {
    return view('layanan', [
        'title' => 'Noken Soft - Layanan',
        'activePage' => 'layanan'
    ]);
});

Route::get('/kontak', function () {
    return view('kontak', [
        'title' => 'Noken Soft - Kontak',
        'activePage' => 'kontak'
    ]);
});
