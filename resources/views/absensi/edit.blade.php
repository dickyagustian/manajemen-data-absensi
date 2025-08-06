@extends('layouts.app')

@section('title', 'Edit Absensi')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Data Absensi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                                    <input type="text" class="form-control @error('nama_karyawan') is-invalid @enderror" 
                                           id="nama_karyawan" name="nama_karyawan" 
                                           value="{{ old('nama_karyawan', $absensi->nama_karyawan) }}" required>
                                    @error('nama_karyawan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                                           id="tanggal" name="tanggal" 
                                           value="{{ old('tanggal', $absensi->tanggal->format('Y-m-d')) }}" required>
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="jam_datang" class="form-label">Jam Datang</label>
                                    <input type="time" class="form-control @error('jam_datang') is-invalid @enderror" 
                                           id="jam_datang" name="jam_datang" 
                                           value="{{ old('jam_datang', $absensi->jam_datang) }}" required>
                                    @error('jam_datang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="jam_pulang" class="form-label">Jam Pulang</label>
                                    <input type="time" class="form-control @error('jam_pulang') is-invalid @enderror" 
                                           id="jam_pulang" name="jam_pulang" 
                                           value="{{ old('jam_pulang', $absensi->jam_pulang) }}">
                                    @error('jam_pulang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="">Pilih Status</option>
                                        <option value="Hadir" {{ old('status', $absensi->status) == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                        <option value="Izin" {{ old('status', $absensi->status) == 'Izin' ? 'selected' : '' }}>Izin</option>
                                        <option value="Sakit" {{ old('status', $absensi->status) == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 