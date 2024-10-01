<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'title' => 'Xoni Agency - Beranda',
        'activePage' => 'index'
    ]);
});
