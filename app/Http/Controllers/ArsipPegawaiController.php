<?php

namespace App\Http\Controllers;
use App\Models\Archive1;
use App\Models\Archive2;
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
        'keterangan' => 'nullable|string',
        'keterangan_sk_jabatan_1' => 'nullable|string',
        
        'tempattugas' => 'nullable|string',
        'sk_jabatan_1' => 'nullable|file|mimes:pdf',
        'sk_cpns' => 'nullable|file|mimes:pdf',
        'sk_pns' => 'nullable|file|mimes:pdf',
        'sk_golongan' => 'nullable|file|mimes:pdf',
        'sk_jabatan' => 'nullable|file|mimes:pdf',
        'buku_nikah' => 'nullable|file|mimes:pdf',
        'akte_kelahiran' => 'nullable|file|mimes:pdf',
        'kartu_pegawai' => 'nullable|file|mimes:pdf',
        'kartu_istri' => 'nullable|file|mimes:pdf',

        // Tambahan baru 👇
        'akte_kelahiran_suami' => 'nullable|file|mimes:pdf',
        'akte_kelahiran_istri' => 'nullable|file|mimes:pdf',
        'akte_kelahiran_anak_1' => 'nullable|file|mimes:pdf',
        'akte_kelahiran_anak_2' => 'nullable|file|mimes:pdf',
        'akte_kelahiran_anak_3' => 'nullable|file|mimes:pdf',
        'akte_kelahiran_anak_4' => 'nullable|file|mimes:pdf',
        'akte_kelahiran_anak_5' => 'nullable|file|mimes:pdf',
        // Tambahkan lagi sesuai kebutuhan
        // 'sk_jabatan.*' => 'nullable|file|mimes:pdf',
        // 'keterangan.*' => 'nullable|string',    
    ]);

    // Simpan file PDF jika ada
    foreach ([
        'sk_cpns', 'sk_pns', 'sk_golongan', 'sk_jabatan','sk_jabatan_1', 
        'keterangan_sk_jabatan_1',
        'buku_nikah', 'akte_kelahiran', 'kartu_pegawai', 'kartu_istri',
        
        // Tambahan baru 👇
        'akte_kelahiran_suami',
        'akte_kelahiran_istri',
        'akte_kelahiran_anak_1',
        'akte_kelahiran_anak_2',
        'akte_kelahiran_anak_3',
        'akte_kelahiran_anak_4',
        'akte_kelahiran_anak_5',
        // Tambahkan lagi sesuai kebutuhan
    ] as $field) {
        if ($request->hasFile($field)) {
            $validated[$field] = $request->file($field)->store("pegawai/{$validated['nrk']}", 'public');
        }
    }

    ArsipPegawai::create($validated);

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
    //          // Ambil hanya archives1 milik pegawai ini
    // $archives1 = Archive1::where('physical_location', $id)->orderBy('stored_at', 'desc')->get();

    // // Ambil hanya archives2 milik pegawai ini
    // $archives2 = Archive2::where('physical_location', $id)->orderBy('stored_at', 'desc')->get();
            $archives1 = Archive1::all();
            $archives2 = Archive2::all();
            $pegawai = ArsipPegawai::findOrFail($id);

    return Inertia::render('arsippegawai/Show', [
        'pegawai' => $pegawai,
        'archives1' => $archives1,
        'archives2' => $archives2
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
    'keterangan' => 'nullable|string',
    'keterangan_sk_jabatan_1' => 'nullable|string',
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
    'buku_nikah', 'akte_kelahiran', 'kartu_pegawai', 'kartu_istri','sk_jabatan_1', 
        'keterangan_sk_jabatan_1',
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
        'buku_nikah', 'akte_kelahiran', 'kartu_pegawai', 'kartu_istri','sk_jabatan_1', 
        'keterangan_sk_jabatan_1',
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
