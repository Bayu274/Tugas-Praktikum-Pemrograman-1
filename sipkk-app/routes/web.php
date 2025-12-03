<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PendaftaranController;

// Pastikan Controller Dashboard Admin dan User sudah ada dan diimpor
// Ubah path Controller sesuai dengan struktur folder Anda
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController; 
use App\Http\Controllers\User\DashboardController as UserDashboardController; 

use App\Models\Kegiatan; 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
});


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

// --- PENGALIHAN DASHBOARD (Default Laravel) ---
// Route dashboard umum yang akan digunakan oleh User BIASA (non-admin)
Route::get('/dashboard', [UserDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    // --- PROFILE ROUTES ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- PENDAFTARAN KEGIATAN (Akses oleh semua user yang sudah login) ---
    Route::get('/pendaftaran-kegiatan/{id}', [PendaftaranController::class, 'create'])->name('pendaftaran-kegiatan.create');
    Route::post('/pendaftaran-kegiatan-save/{id}', [PendaftaranController::class, 'store'])->name('pendaftaran-kegiatan.save');
    Route::get('/pendaftaran/cetak-bukti/{id}',[PendaftaranController::class,'show'])->name('pendaftaran.show');
});


/*
|--------------------------------------------------------------------------
| Admin Routes (role:admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    
    // 1. DASHBOARD ADMIN
    // Route khusus dashboard admin
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard'); 

    // 2. KEGIATAN (Resource Controller)
    // Route resource untuk Kegiatan (CRUD)
    Route::resource('kegiatan', KegiatanController::class);

    // 3. DATA KEGIATAN ADMIN (Custom Routes jika diperlukan)
    Route::get('/admin/data-kegiatan', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.kegiatan.index');
    Route::get('/admin/tambah-kegiatan', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.kegiatan.create');
    Route::post('/admin/save-kegiatan', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.kegiatan.store');

});

require __DIR__.'/auth.php';