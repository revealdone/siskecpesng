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
            $table->string('akte_kelahiran_suami')->nullable();
    $table->string('akte_kelahiran_istri')->nullable();
    $table->string('akte_kelahiran_anak_1')->nullable();
    $table->string('akte_kelahiran_anak_2')->nullable();
    $table->string('akte_kelahiran_anak_3')->nullable();
    $table->string('akte_kelahiran_anak_4')->nullable();
    $table->string('akte_kelahiran_anak_5')->nullable();
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
