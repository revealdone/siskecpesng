<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArsipPegawai extends Model
{
    //
    protected $fillable = [
        'nrk',
        'nama',
        'lokasi_rak',
        'sk_cpns',
        'sk_pns',
        'sk_golongan',
        'sk_jabatan',
        'buku_nikah',
        'akte_kelahiran',
        'kartu_pegawai',
        'kartu_istri',
        // tambahkan kolom lain sesuai dengan tabel
    ];
}
