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
        Schema::table('arsip_pegawais', function (Blueprint $table) {
            //
            $table->string('sk_jabatan_1')->nullable();
$table->string('keterangan_sk_jabatan_1')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('arsip_pegawais', function (Blueprint $table) {
            //
        });
    }
};
