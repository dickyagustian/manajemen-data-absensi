<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Absensi;
use Carbon\Carbon;

class AbsensiSeeder extends Seeder
{
    /**
     * Menjalankan seeder untuk mengisi data absensi.
     */
    public function run(): void
    {
        // Database kosong - tidak ada data dummy
        // Uncomment kode di bawah jika ingin menambahkan data dummy lagi
        
        /*
        $karyawan = [
            'Ahmad Rizki',
            'Siti Nurhaliza',
            'Budi Santoso',
            'Dewi Sartika',
            'Muhammad Fajar'
        ];

        $statuses = ['Hadir', 'Izin', 'Sakit'];
        
        // Generate data untuk 30 hari terakhir
        for ($i = 30; $i >= 0; $i--) {
            $tanggal = Carbon::now()->subDays($i);
            
            foreach ($karyawan as $nama) {
                $status = $statuses[array_rand($statuses)];
                $jamDatang = Carbon::createFromTime(rand(7, 9), rand(0, 59), 0);
                $jamPulang = null;
                
                // Jika status Hadir, berikan jam pulang
                if ($status === 'Hadir') {
                    $jamPulang = Carbon::createFromTime(rand(16, 18), rand(0, 59), 0);
                }
                
                Absensi::create([
                    'nama_karyawan' => $nama,
                    'tanggal' => $tanggal->format('Y-m-d'),
                    'jam_datang' => $jamDatang->format('H:i:s'),
                    'jam_pulang' => $jamPulang ? $jamPulang->format('H:i:s') : null,
                    'status' => $status
                ]);
            }
        }
        */
    }
}
