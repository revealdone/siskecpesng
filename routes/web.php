<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ArchiveController1;
use App\Http\Controllers\ArchiveController2;
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

    // sk jabatan 1
    Route::get('/archives1', [ArchiveController1::class, 'index'])->name('archives1.index');
    Route::post('/archives1', [ArchiveController1::class, 'store'])->name('archives1.store');
    Route::delete('/archives1/{archive1}', [ArchiveController1::class, 'destroy'])->name('archives1.destroy');
    Route::delete('/archives1/{archive1}', [ArchiveController1::class, 'destroy']);

    Route::get('/archives1/create', function () {
        return Inertia::render('archives1/Create');
    })->name('archives1.create');

    // sertifikat diklat
    Route::get('/archives2', [ArchiveController2::class, 'index'])->name('archives2.index');
    Route::post('/archives2', [ArchiveController2::class, 'store'])->name('archives2.store');
    Route::delete('/archives2/{archive2}', [ArchiveController2::class, 'destroy'])->name('archives2.destroy');
    Route::delete('/archives2/{archive2}', [ArchiveController2::class, 'destroy']);

    Route::get('/archives2/create', function () {
        return Inertia::render('archives2/Create');
    })->name('archives2.create');
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
