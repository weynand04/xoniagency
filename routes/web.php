<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;

require __DIR__ . '/auth.php';


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

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/login', Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
