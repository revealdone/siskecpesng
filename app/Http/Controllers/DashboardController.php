<?php

namespace App\Http\Controllers;
use App\Models\Archive;
use Inertia\Inertia;
use App\Models\ArsipPegawai;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $total = Archive::count();

    $expired = Archive::whereDate('stored_at', '<', now()->subYears(2))->count();

    $thisYear = Archive::whereYear('stored_at', now()->year)->count();

    return Inertia::render('Dashboard', [
        'summary' => [
            'total' => $total,
            'expired' => $expired,
            'this_year' => $thisYear,
        ]
    ]);

       $total = ArsipPegawai::count();
    $expired = ArsipPegawai::where('created_at', '<', Carbon::now()->subYears(2))->count();
    $thisYear = ArsipPegawai::whereYear('created_at', now()->year)->count();

    return Inertia::render('Dashboard', [
        'summary' => [
            'total' => $total,
            'expired' => $expired,
            'this_year' => $thisYear,
        ]
    ]);
}
}
