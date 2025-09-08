<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ServicesController;

require __DIR__ . '/auth.php';


Route::get('/index-edit', [IndexController::class, 'index'])->name('index.edit');
Route::post('/index-edit', [IndexController::class, 'update'])->name('index.update');

Route::get('/layanan-edit', [ServicesController::class, 'index'])->name('layanan.edit');

Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/tentang', function () {
    return view('tentang', [
        'title' => 'Xoni Agency - Tentang',
        'activePage' => 'tentang'
    ]);
});

Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');


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

    Route::get('/index-edit', [IndexController::class, 'index'])->name('index-edit');
    Route::post('/index-update', [IndexController::class, 'update'])->name('index-update');
});
