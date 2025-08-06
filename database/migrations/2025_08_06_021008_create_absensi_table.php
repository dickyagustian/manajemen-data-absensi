<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migration untuk membuat tabel absensi.
     */
    public function up(): void
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->date('tanggal');
            $table->time('jam_datang');
            $table->time('jam_pulang')->nullable();
            $table->enum('status', ['Hadir', 'Izin', 'Sakit'])->default('Hadir');
            $table->timestamps();
        });
    }

    /**
     * Membalikkan migration (menghapus tabel absensi).
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
