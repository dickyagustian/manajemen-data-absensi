<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    /**
     * Menampilkan daftar data absensi.
     */
    public function index(Request $request)
    {
        $absensi = Absensi::orderBy('tanggal', 'desc')
                         ->orderBy('jam_datang', 'desc')
                         ->paginate(10);
        
        return view('absensi.index', compact('absensi'));
    }

    /**
     * Menampilkan form untuk menambah data absensi baru.
     */
    public function create()
    {
        return view('absensi.create');
    }

    /**
     * Menyimpan data absensi baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_datang' => 'required',
            'status' => 'required|in:Hadir,Izin,Sakit'
        ]);

        Absensi::create([
            'nama_karyawan' => $request->nama_karyawan,
            'tanggal' => $request->tanggal,
            'jam_datang' => $request->jam_datang,
            'status' => $request->status
        ]);

        return redirect()->route('absensi.index')
                        ->with('success', 'Data absensi berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail data absensi tertentu.
     */
    public function show(string $id)
    {
        $absensi = Absensi::findOrFail($id);
        return view('absensi.show', compact('absensi'));
    }

    /**
     * Menampilkan form untuk mengedit data absensi.
     */
    public function edit(string $id)
    {
        $absensi = Absensi::findOrFail($id);
        return view('absensi.edit', compact('absensi'));
    }

    /**
     * Memperbarui data absensi di database.
     */
    public function update(Request $request, string $id)
    {
        $absensi = Absensi::findOrFail($id);
        
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_datang' => 'required',
            'jam_pulang' => 'nullable',
            'status' => 'required|in:Hadir,Izin,Sakit'
        ]);

        $absensi->update($request->all());

        return redirect()->route('absensi.index')
                        ->with('success', 'Data absensi berhasil diperbarui!');
    }

    /**
     * Menghapus data absensi dari database.
     */
    public function destroy(string $id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect()->route('absensi.index')
                        ->with('success', 'Data absensi berhasil dihapus!');
    }

    /**
     * Fungsi untuk melakukan check-out (mengisi jam pulang).
     */
    public function checkout(string $id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->update([
            'jam_pulang' => Carbon::now()->format('H:i:s')
        ]);

        return redirect()->route('absensi.index')
                        ->with('success', 'Check-out berhasil dicatat!');
    }

    /**
     * Menghapus semua data absensi dari database.
     */
    public function clearAll()
    {
        $count = Absensi::count();
        
        if ($count === 0) {
            return redirect()->route('absensi.index')
                            ->with('info', 'Database sudah kosong. Tidak ada data yang perlu dihapus.');
        }

        Absensi::truncate();

        return redirect()->route('absensi.index')
                        ->with('success', "Berhasil menghapus {$count} data absensi!");
    }
}
