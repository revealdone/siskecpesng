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
        'sk_jabatan_1', 
        'keterangan_sk_jabatan_1',
        'tempattugas',
        'keterangan',
        'sk_cpns',
        'sk_pns',
        'sk_golongan',
        'sk_jabatan',
        'buku_nikah',
        'akte_kelahiran',
        'kartu_pegawai',
        'kartu_istri',
        'akte_kelahiran_suami',
        'akte_kelahiran_istri',
        'akte_kelahiran_anak_1',
        'akte_kelahiran_anak_2',
        'akte_kelahiran_anak_3',
        'akte_kelahiran_anak_4',
        'akte_kelahiran_anak_5',
        'jabatan',
        // tambahkan kolom lain sesuai dengan tabel
    ];
}
