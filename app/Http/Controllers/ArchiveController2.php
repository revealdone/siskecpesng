<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Archive2;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

// app/Http/Controllers/ArchiveController.php
class ArchiveController2 extends Controller
{
    public function index()
{
    $archives2 = Archive2::orderBy('stored_at', 'desc')->get();

    return Inertia::render('archives2/Index', [
        'archives2' => $archives2
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
public function destroy(Archive2 $archive2)
{
    // Hapus file PDF
    if ($archive2->pdf_path && Storage::disk('public')->exists($archive2->pdf_path)) {
        Storage::disk('public')->delete($archive2->pdf_path);
    }

    // Kalau mau hapus kolom2 lain yang file (misalnya `sk_jabatan`, `sk_golongan`, dll):
    // $fileFields = ['sk_jabatan', 'sk_golongan', 'sertifikat_diklat'];
    // foreach ($fileFields as $field) {
    //     if ($archive1->$field && Storage::disk('public')->exists($archive1->$field)) {
    //         Storage::disk('public')->delete($archive1->$field);
    //     }
    // }

    $archive2->delete();

    return back()->with('success', 'Arsip berhasil dihapus');
}




    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'physical_location' => 'required|string|max:255',
            'stored_at' => 'required|date',
            'pdf_file' => 'required|mimes:pdf',
        ]);

        $path = $request->file('pdf_file')->store('archives2', 'public');

        Archive2::create([
            ...$validated,
            'pdf_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Arsip berhasil ditambahkan');
    }
}

