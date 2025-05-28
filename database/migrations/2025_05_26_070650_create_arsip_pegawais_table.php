<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('arsip_pegawais', function (Blueprint $table) {
        $table->id();
        $table->string('nrk');
        $table->string('nama');
        $table->string('lokasi_rak');
        $table->string('sk_cpns')->nullable();
        $table->string('sk_pns')->nullable();
        $table->string('sk_golongan')->nullable();
        $table->string('sk_jabatan')->nullable();
        $table->string('buku_nikah')->nullable();
        $table->string('akte_kelahiran')->nullable();
        $table->string('kartu_pegawai')->nullable();
        $table->string('kartu_istri')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip_pegawais');
    }
};
