<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Archive1;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

// app/Http/Controllers/ArchiveController.php
class ArchiveController1 extends Controller
{
    public function index()
{
    $archives1 = Archive1::orderBy('stored_at', 'desc')->get();

    return Inertia::render('archives1/Index', [
        'archives1' => $archives1
    ]);
}

// public function destroy(Archive1 $Archives1)
// {
//     // Hapus file fisik jika ada
//     if (Storage::disk('public')->exists($Archives1->pdf_path)) {
//         Storage::disk('public')->delete($Archives1->pdf_path);
//     }
//         // Hapus semua file
//     foreach ($Archives1 as $field) {
//         if ($Archives1->$field) {
//             Storage::disk('public')->delete($Archives1->$field);
//         }
//     }

//     $Archives1->delete();

//     return back()->with('success', 'Arsip berhasil dihapus');
// }
public function destroy(Archive1 $archive1)
{
    // Hapus file PDF
    if ($archive1->pdf_path && Storage::disk('public')->exists($archive1->pdf_path)) {
        Storage::disk('public')->delete($archive1->pdf_path);
    }

    // Kalau mau hapus kolom2 lain yang file (misalnya `sk_jabatan`, `sk_golongan`, dll):
    // $fileFields = ['sk_jabatan', 'sk_golongan', 'sertifikat_diklat'];
    // foreach ($fileFields as $field) {
    //     if ($archive1->$field && Storage::disk('public')->exists($archive1->$field)) {
    //         Storage::disk('public')->delete($archive1->$field);
    //     }
    // }

    $archive1->delete();

    return back()->with('success', 'Arsip berhasil dihapus');
}




    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'physical_location' => 'required|string|max:255',
            'stored_at' => 'required|date',
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);

        $path = $request->file('pdf_file')->store('archives1', 'public');

        Archive1::create([
            ...$validated,
            'pdf_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Arsip berhasil ditambahkan');
    }
}

