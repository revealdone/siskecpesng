<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Archive;
use Illuminate\Http\Request;
use Inertia\Inertia;

// app/Http/Controllers/ArchiveController.php
class ArchiveController extends Controller
{
    public function index()
{
    $archives = Archive::orderBy('stored_at', 'desc')->get();

    return Inertia::render('archives/Index', [
        'archives' => $archives
    ]);
}

public function destroy(Archive $archive)
{
    // Hapus file fisik jika ada
    if (Storage::disk('public')->exists($archive->pdf_path)) {
        Storage::disk('public')->delete($archive->pdf_path);
    }

    $archive->delete();

    return back()->with('success', 'Arsip berhasil dihapus');
}
    // public function index()
    // {
    //     $archives = Archive::orderBy('stored_at', 'desc')->get();
    //     return Inertia::render('Archives/Index', compact('archives'));
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'physical_location' => 'required|string|max:255',
            'stored_at' => 'required|date',
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);

        $path = $request->file('pdf_file')->store('archives', 'public');

        Archive::create([
            ...$validated,
            'pdf_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Arsip berhasil ditambahkan');
    }
}

