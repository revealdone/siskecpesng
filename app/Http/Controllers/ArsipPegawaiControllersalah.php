<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ArsipPegawai;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;



class ArsipPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $query = ArsipPegawai::query();

    if ($search = $request->input('search')) {
        $query->where('nrk', 'like', "%$search%")
              ->orWhere('nama', 'like', "%$search%")
              ->orWhere('lokasi_rak', 'like', "%$search%");
    }

    $pegawai = $query->latest()->paginate(10)->withQueryString();

    return Inertia::render('arsippegawai/Index', [
        'pegawai' => $pegawai,
        'filters' => $request->only('search'),
    ]);


}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('pegawai/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'nrk' => 'required|string',
        'nama' => 'required|string',
        'lokasi_rak' => 'required|string',
        'jabatan' => 'nullable|string',
        'keterangan' => 'nullable|array',
        // 'keterangan.*' => 'nullable|string',
        'tempattugas' => 'nullable|string',
        'sk_cpns' => 'nullable|file|mimes:pdf',
        'sk_pns' => 'nullable|file|mimes:pdf',
        'sk_golongan' => 'nullable|file|mimes:pdf',

        // 👇 ubah menjadi array
        // 'sk_jabatan' => 'nullable|array',
        'sk_jabatan.*' => 'nullable|file|mimes:pdf',

        'buku_nikah' => 'nullable|file|mimes:pdf',
        'akte_kelahiran' => 'nullable|file|mimes:pdf',
        'kartu_pegawai' => 'nullable|file|mimes:pdf',
        'kartu_istri' => 'nullable|file|mimes:pdf',
        'akte_kelahiran_suami' => 'nullable|file|mimes:pdf',
        'akte_kelahiran_istri' => 'nullable|file|mimes:pdf',
        'akte_kelahiran_anak_1' => 'nullable|file|mimes:pdf',
        'akte_kelahiran_anak_2' => 'nullable|file|mimes:pdf',
        'akte_kelahiran_anak_3' => 'nullable|file|mimes:pdf',
        'akte_kelahiran_anak_4' => 'nullable|file|mimes:pdf',
        'akte_kelahiran_anak_5' => 'nullable|file|mimes:pdf',
    ]);

    // Simpan file PDF satuan (bukan array)
    // foreach ([
    //     'sk_cpns', 'sk_pns', 'sk_golongan',
    //     'buku_nikah', 'akte_kelahiran', 'kartu_pegawai', 'kartu_istri',
    //     'akte_kelahiran_suami', 'akte_kelahiran_istri',
    //     'akte_kelahiran_anak_1', 'akte_kelahiran_anak_2',
    //     'akte_kelahiran_anak_3', 'akte_kelahiran_anak_4',
    //     'akte_kelahiran_anak_5'
    // ] as $field) {
    //     if ($request->hasFile($field)) {
    //         $validated[$field] = $request->file($field)->store("pegawai/{$validated['nrk']}", 'public');
    //     }
    // }

    // Simpan data utama (tanpa sk_jabatan array)
    $arsipPegawai = ArsipPegawai::create([
        'nrk' => $validated['nrk'],
        'nama' => $validated['nama'],
        'lokasi_rak' => $validated['lokasi_rak'],
        'jabatan' => $validated['jabatan'] ?? null,
        'keterangan' => null, // diabaikan untuk yang array
        'tempattugas' => $validated['tempattugas'] ?? null,
        'sk_cpns' => $validated['sk_cpns'] ?? null,
        'sk_pns' => $validated['sk_pns'] ?? null,
        'sk_golongan' => $validated['sk_golongan'] ?? null,
        'buku_nikah' => $validated['buku_nikah'] ?? null,
        'akte_kelahiran' => $validated['akte_kelahiran'] ?? null,
        'kartu_pegawai' => $validated['kartu_pegawai'] ?? null,
        'kartu_istri' => $validated['kartu_istri'] ?? null,
        'akte_kelahiran_suami' => $validated['akte_kelahiran_suami'] ?? null,
        'akte_kelahiran_istri' => $validated['akte_kelahiran_istri'] ?? null,
        'akte_kelahiran_anak_1' => $validated['akte_kelahiran_anak_1'] ?? null,
        'akte_kelahiran_anak_2' => $validated['akte_kelahiran_anak_2'] ?? null,
        'akte_kelahiran_anak_3' => $validated['akte_kelahiran_anak_3'] ?? null,
        'akte_kelahiran_anak_4' => $validated['akte_kelahiran_anak_4'] ?? null,
        'akte_kelahiran_anak_5' => $validated['akte_kelahiran_anak_5'] ?? null,
    ]);

    // 👇 Handle multiple sk_jabatan & keterangan array
    if (!empty($validated['sk_jabatan'])) {
        foreach ($validated['sk_jabatan'] as $index => $file) {
            $path = $file->store("pegawai/{$validated['nrk']}/sk_jabatan", 'public');
            // Simpan setiap file sebagai record baru (misalnya 1 record per file sk_jabatan)
            ArsipPegawai::create([
                'nrk' => $validated['nrk'],
                'nama' => $validated['nama'],
                'lokasi_rak' => $validated['lokasi_rak'],
                'jabatan' => $validated['jabatan'] ?? null,
                'keterangan' => $validated['keterangan'][$index] ?? null,
                'sk_jabatan' => $path,
                'tempattugas' => $validated['tempattugas'] ?? null,
            ]);
        }
    }

    return redirect()->route('arsip-pegawai.index')->with('success', 'Data arsip pegawai berhasil disimpan.');
}


//     public function store(Request $request)
// {
//     $validated = $request->validate([
//         'nrk' => 'required|string',
//         'nama' => 'required|string',
//         'lokasi_rak' => 'required|string',
//         'sk_cpns' => 'nullable|file|mimes:pdf',
//         'sk_pns' => 'nullable|file|mimes:pdf',
//         'sk_golongan' => 'nullable|file|mimes:pdf',
//         'sk_jabatan' => 'nullable|file|mimes:pdf',
//         'buku_nikah' => 'nullable|file|mimes:pdf',
//         'akte_kelahiran' => 'nullable|file|mimes:pdf',
//         'kartu_pegawai' => 'nullable|file|mimes:pdf',
//         'kartu_istri' => 'nullable|file|mimes:pdf',
//     ]);

//     // Simpan file PDF jika ada
//     foreach ([
//         'sk_cpns', 'sk_pns', 'sk_golongan', 'sk_jabatan',
//         'buku_nikah', 'akte_kelahiran', 'kartu_pegawai', 'kartu_istri'
//     ] as $field) {
//         if ($request->hasFile($field)) {
//             $validated[$field] = $request->file($field)->store("pegawai/{$validated['nrk']}", 'public');
//         }
//     }

//     ArsipPegawai::create($validated);

//     return redirect()->route('arsip-pegawai.index')->with('success', 'Data arsip pegawai berhasil disimpan.');
// }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
            $pegawai = ArsipPegawai::findOrFail($id);

    return Inertia::render('arsippegawai/Show', [
        'pegawai' => $pegawai,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pegawai = ArsipPegawai::findOrFail($id);
    return Inertia::render('arsippegawai/Edit', ['pegawai' => $pegawai]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pegawai = ArsipPegawai::findOrFail($id);

    $validated = $request->validate([
    'nrk' => 'required|string',
    'nama' => 'required|string',
    'jabatan' => 'nullable|string',
    'keterangan' => 'nullable|string',
    'tempattugas' => 'nullable|string',
    'lokasi_rak' => 'required|string',
    'sk_cpns' => 'nullable|file|mimes:pdf',
    'sk_pns' => 'nullable|file|mimes:pdf',
    'sk_golongan' => 'nullable|file|mimes:pdf',
    'sk_jabatan' => 'nullable|file|mimes:pdf',
    'buku_nikah' => 'nullable|file|mimes:pdf',
    'akte_kelahiran' => 'nullable|file|mimes:pdf',
    'kartu_pegawai' => 'nullable|file|mimes:pdf',
    'kartu_istri' => 'nullable|file|mimes:pdf',
    'akte_kelahiran_suami' => 'nullable|file|mimes:pdf',
    'akte_kelahiran_istri' => 'nullable|file|mimes:pdf',
    'akte_kelahiran_anak_1' => 'nullable|file|mimes:pdf',
    'akte_kelahiran_anak_2' => 'nullable|file|mimes:pdf',
    'akte_kelahiran_anak_3' => 'nullable|file|mimes:pdf',
    'akte_kelahiran_anak_4' => 'nullable|file|mimes:pdf',
    'akte_kelahiran_anak_5' => 'nullable|file|mimes:pdf',
    ]);

    // Update data dasar
    $pegawai->update($validated);

    // Update file jika ada
    foreach ([
    'sk_cpns', 'sk_pns', 'sk_golongan', 'sk_jabatan','jabatan',
    'buku_nikah', 'akte_kelahiran', 'kartu_pegawai', 'kartu_istri',
    'akte_kelahiran_suami', 'akte_kelahiran_istri',
    'akte_kelahiran_anak_1', 'akte_kelahiran_anak_2',
    'akte_kelahiran_anak_3', 'akte_kelahiran_anak_4',
    'akte_kelahiran_anak_5'
] as $field) {
if ($request->hasFile($field)) {
    if ($pegawai->$field) {
        Storage::disk('public')->delete($pegawai->$field);
    }
    $pegawai->update([
        $field => $request->file($field)->store("pegawai/{$pegawai->nrk}", 'public'),
    ]);
}

}

    // foreach (['file_sk_cpns', 'file_sk_pns', 'file_sk_golongan', 'file_sk_jabatan', 'file_buku_nikah', 'file_akte_kelahiran', 'file_kartu_pegawai', 'file_kartu_istri'] as $field) {
    //     if ($request->hasFile($field)) {
    //         $pegawai->update([$field => $request->file($field)->store('arsip-pegawai', 'public')]);
    //     }
    // }

    return redirect()->route('arsip-pegawai.index')->with('success', 'Data berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $pegawai = ArsipPegawai::findOrFail($id);

    // Daftar field file
    $fileFields = [
        'sk_cpns', 'sk_pns', 'sk_golongan', 'sk_jabatan','jabatan',
        'buku_nikah', 'akte_kelahiran', 'kartu_pegawai', 'kartu_istri',
        'akte_kelahiran_suami', 'akte_kelahiran_istri',
        'akte_kelahiran_anak_1', 'akte_kelahiran_anak_2',
        'akte_kelahiran_anak_3', 'akte_kelahiran_anak_4',
        'akte_kelahiran_anak_5'
    ];

    // Hapus semua file
    foreach ($fileFields as $field) {
        if ($pegawai->$field) {
            Storage::disk('public')->delete($pegawai->$field);
        }
    }

    // Hapus folder pegawai/{nrk}
    Storage::disk('public')->deleteDirectory("pegawai/{$pegawai->nrk}");

    // Hapus data dari database
    $pegawai->delete();

    return redirect()->route('arsip-pegawai.index')->with('success', 'Data dan folder berhasil dihapus.');
}
    // public function destroy(string $id)
    // {
    //     //
    //     $pegawai = ArsipPegawai::findOrFail($id);
    // $pegawai->delete();

    // return redirect()->route('arsip-pegawai.index')->with('success', 'Data berhasil dihapus.');
    // }
}
