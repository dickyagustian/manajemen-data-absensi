@extends('layouts.app')

@section('title', 'Detail Absensi')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="avatar-lg bg-info rounded-circle d-flex align-items-center justify-content-center me-3">
                        <i class="bi bi-eye text-white"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-0">Detail Data Absensi</h5>
                        <small class="text-muted">Informasi lengkap data absensi karyawan</small>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="form-label fw-semibold text-muted">
                                        <i class="bi bi-hash me-2"></i>ID Absensi
                                    </label>
                                    <div class="fw-bold fs-5">#{{ $absensi->id }}</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="form-label fw-semibold text-muted">
                                        <i class="bi bi-person me-2"></i>Nama Karyawan
                                    </label>
                                    <div class="fw-bold fs-5">{{ $absensi->nama_karyawan }}</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="form-label fw-semibold text-muted">
                                        <i class="bi bi-calendar me-2"></i>Tanggal
                                    </label>
                                    <div class="fw-bold fs-5">{{ $absensi->tanggal->format('d/m/Y') }}</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="form-label fw-semibold text-muted">
                                        <i class="bi bi-clock me-2"></i>Jam Datang
                                    </label>
                                    <div class="fw-bold fs-5 text-success">
                                        <i class="bi bi-clock me-1"></i>{{ $absensi->jam_datang }}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="form-label fw-semibold text-muted">
                                        <i class="bi bi-clock-fill me-2"></i>Jam Pulang
                                    </label>
                                    @if($absensi->jam_pulang)
                                        <div class="fw-bold fs-5 text-info">
                                            <i class="bi bi-clock-fill me-1"></i>{{ $absensi->jam_pulang }}
                                        </div>
                                    @else
                                        <div class="fw-bold fs-5 text-warning">
                                            <i class="bi bi-clock me-1"></i>Belum pulang
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="form-label fw-semibold text-muted">
                                        <i class="bi bi-info-circle me-2"></i>Status
                                    </label>
                                    <div>
                                        @if($absensi->status == 'Hadir')
                                            <span class="badge bg-success fs-6">
                                                <i class="bi bi-check-circle me-1"></i>{{ $absensi->status }}
                                            </span>
                                        @elseif($absensi->status == 'Izin')
                                            <span class="badge bg-warning fs-6">
                                                <i class="bi bi-exclamation-triangle me-1"></i>{{ $absensi->status }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger fs-6">
                                                <i class="bi bi-x-circle me-1"></i>{{ $absensi->status }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <h6 class="card-title fw-semibold mb-3">
                                    <i class="bi bi-clock-history me-2"></i>Informasi Tambahan
                                </h6>
                                
                                <div class="mb-3">
                                    <small class="text-muted d-block">Dibuat pada:</small>
                                    <span class="fw-medium">{{ $absensi->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                                
                                <div class="mb-3">
                                    <small class="text-muted d-block">Terakhir diperbarui:</small>
                                    <span class="fw-medium">{{ $absensi->updated_at->format('d/m/Y H:i') }}</span>
                                </div>
                                
                                <div class="mb-3">
                                    <small class="text-muted d-block">Status Check-out:</small>
                                    @if($absensi->jam_pulang)
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle me-1"></i>Sudah Check-out
                                        </span>
                                    @else
                                        <span class="badge bg-warning">
                                            <i class="bi bi-clock me-1"></i>Belum Check-out
                                        </span>
                                    @endif
                                </div>
                                
                                @if($absensi->jam_pulang)
                                    <div class="mb-3">
                                        <small class="text-muted d-block">Durasi Kerja:</small>
                                        @php
                                            $jamDatang = \Carbon\Carbon::parse($absensi->jam_datang);
                                            $jamPulang = \Carbon\Carbon::parse($absensi->jam_pulang);
                                            $durasi = $jamDatang->diff($jamPulang);
                                        @endphp
                                        <span class="fw-medium">{{ $durasi->format('%H jam %i menit') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('absensi.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Kembali
                    </a>
                    <div class="d-flex gap-2">
                        <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil me-2"></i>Edit
                        </a>
                        <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash me-2"></i>Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-lg {
    width: 48px;
    height: 48px;
    font-size: 20px;
}

.info-item {
    padding: 1rem;
    background: #f8fafc;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
}

.info-item:hover {
    background: #f1f5f9;
    transition: background-color 0.2s ease;
}
</style>
@endsection 