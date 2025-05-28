<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArsipPegawaiController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

// new
Route::middleware(['auth', 'verified'])->group(function () {

    // Resource route untuk arsip pegawai
    Route::resource('arsip-pegawai', ArsipPegawaiController::class);
    Route::get('/pegawai/create', [ArsipPegawaiController::class, 'create'])->name('pegawai.create');
    

    // Dashboard arsip biasa
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route arsip biasa
    Route::get('/archives', [ArchiveController::class, 'index'])->name('archives.index');
    Route::post('/archives', [ArchiveController::class, 'store'])->name('archives.store');
    Route::delete('/archives/{archive}', [ArchiveController::class, 'destroy'])->name('archives.destroy');

    Route::get('/archives/create', function () {
        return Inertia::render('archives/Create');
    })->name('archives.create');
});



// ✅ Gunakan hanya satu route 'dashboard'
// Route::middleware(['auth', 'verified'])->group(function () {

//     // arsip pegawai
//     Route::resource('arsip-pegawai', ArsipPegawaiController::class);
//     Route::get('/arsip-pegawai', [ArsipPegawaiController::class, 'index'])->name('arsip-pegawai.index');
//     Route::get('/arsip-pegawai/{id}', [ArsipPegawaiController::class, 'show'])->name('arsip-pegawai.show');
//     Route::get('/arsip-pegawai/{id}/edit', [ArsipPegawaiController::class, 'edit'])->name('arsip-pegawai.edit');
//     Route::put('/arsip-pegawai/{id}', [ArsipPegawaiController::class, 'update'])->name('arsip-pegawai.update');
//     Route::delete('/arsip-pegawai/{id}', [ArsipPegawaiController::class, 'destroy'])->name('arsip-pegawai.destroy');


//     // arsip
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//     Route::get('/archives', [ArchiveController::class, 'index'])->name('archives.index');
//     Route::post('/archives', [ArchiveController::class, 'store']);
//     Route::delete('/archives/{archive}', [ArchiveController::class, 'destroy']);

//     Route::get('/archives/create', function () {
//         return Inertia::render('archives/Create');
//     });
// });




// use Illuminate\Support\Facades\Route;
// use Inertia\Inertia;
// use App\Http\Controllers\ArchiveController;
// use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// })->name('home');

// Route::get('dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', [ArchiveController::class, 'index'])->name('dashboard');
//     Route::post('/archives', [ArchiveController::class, 'store']);
//         Route::get('/archives', [ArchiveController::class, 'index'])->name('archives.index');
//     Route::delete('/archives/{archive}', [ArchiveController::class, 'destroy']);
// });

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);


// Route::get('/archives/create', function () {
//     return Inertia::render('Archives/Create');
// })->middleware(['auth', 'verified']);


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
