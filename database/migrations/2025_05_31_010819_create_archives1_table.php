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
        Schema::create('archives1', function (Blueprint $table) {
            $table->id();
        $table->string('title');
        $table->string('physical_location'); // contoh: Rak A / Kotak 1
        $table->string('pdf_path');
        $table->date('stored_at'); // tanggal arsip disimpan
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives1');
    }
};
