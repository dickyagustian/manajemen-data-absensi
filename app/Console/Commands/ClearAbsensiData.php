<?php

namespace App\Console\Commands;

use App\Models\Absensi;
use Illuminate\Console\Command;

class ClearAbsensiData extends Command
{
    /**
     * Nama dan signature dari command console.
     *
     * @var string
     */
    protected $signature = 'absensi:clear {--confirm : Skip confirmation prompt}';

    /**
     * Deskripsi command console.
     *
     * @var string
     */
    protected $description = 'Menghapus semua data absensi karyawan';

    /**
     * Menjalankan command console.
     */
    public function handle()
    {
        $count = Absensi::count();
        
        if ($count === 0) {
            $this->info('Database sudah kosong. Tidak ada data absensi yang perlu dihapus.');
            return;
        }

        if (!$this->option('confirm')) {
            if (!$this->confirm("Anda yakin ingin menghapus {$count} data absensi? Tindakan ini tidak dapat dibatalkan!")) {
                $this->info('Operasi dibatalkan.');
                return;
            }
        }

        $this->info("Menghapus {$count} data absensi...");
        
        $bar = $this->output->createProgressBar($count);
        $bar->start();

        Absensi::chunk(100, function ($absensi) use ($bar) {
            foreach ($absensi as $item) {
                $item->delete();
                $bar->advance();
            }
        });

        $bar->finish();
        $this->newLine();
        
        $this->info('✅ Semua data absensi berhasil dihapus!');
        $this->info("📊 Total data yang dihapus: {$count} records");
    }
}
