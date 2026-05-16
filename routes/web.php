<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

// ==========================================
// 1. RUTE PUBLIK (Bisa Diakses Siapa Saja / Tanpa Login)
// ==========================================
Route::get('/', [CampaignController::class, 'landing'])->name('landing');
Route::get('/explore', [CampaignController::class, 'index'])->name('campaign.index');
Route::get('/campaign/{id}', [CampaignController::class, 'show'])->name('campaign.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');


// ==========================================
// 2. RUTE PROTECTED (Wajib Login - Auth & Verified)
// ==========================================
Route::middleware(['auth', 'verified'])->group(function () {

    // --- DASHBOARD ROUTING (Berdasarkan Role User) ---
    Route::get('/dashboard', function () {
        // Jika yang login adalah admin (asumsi ada kolom 'role' di tabel users)
        if (auth()->user()->role === 'admin') {
            return view('admin.dashboard');
        }

        // Jika user biasa / relawan yang login
        $stats = [
            'total_users'  => \App\Models\User::count(),
            'my_actions'   => 0, // Nanti diisi query jumlah aksi user ini
            'total_impact' => 0,
        ];
        
        // Mengembalikan data ke dashboard relawan
        // Pastikan nama file view-mu sesuai, di sini mengarah ke resources/views/dashboard.blade.php
        return view('dashboard', compact('stats'));
    })->name('dashboard');


    // --- RUTE FITUR KAMPANYE RELAWAN ---
    Route::get('/explore/create', [CampaignController::class, 'create'])->name('explore.create');
    Route::post('/explore', [CampaignController::class, 'store'])->name('explore.store');
    

    // --- RUTE UNTUK UNGGAH GALERI DAMPAK ---
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');


    // --- RUTE PENGATURAN PROFIL (Bawaan Laravel Breeze) ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// Memanggil sistem autentikasi bawaan Breeze (Login, Register, Logout, dll)
require __DIR__ . '/auth.php';