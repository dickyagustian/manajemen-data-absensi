<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model untuk mengelola data absensi karyawan
 */
class Absensi extends Model
{
    /**
     * Nama tabel yang digunakan
     */
    protected $table = 'absensi';
    
    /**
     * Kolom-kolom yang dapat diisi (mass assignment)
     */
    protected $fillable = [
        'nama_karyawan',
        'tanggal',
        'jam_datang',
        'jam_pulang',
        'status'
    ];

    /**
     * Konversi tipe data untuk kolom tertentu
     */
    protected $casts = [
        'tanggal' => 'date',
        'jam_datang' => 'datetime',
        'jam_pulang' => 'datetime',
    ];
}
