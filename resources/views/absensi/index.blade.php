@extends('layouts.app')


@section('title', 'Data Absensi Karyawan')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title mb-0">Data Absensi Karyawan</h5>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('absensi.create') }}" class="btn btn-primary">Tambah Absensi</a>
                    @if($absensi->count() > 0)
                        <form action="{{ route('absensi.clearAll') }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('⚠️ PERHATIAN!\n\nAnda yakin ingin menghapus SEMUA data absensi?\n\nTindakan ini tidak dapat dibatalkan dan akan menghapus {{ $absensi->total() }} data!')">
                                Hapus Semua
                            </button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <!-- Data Table -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="20%">Nama Karyawan</th>
                                <th width="15%">Tanggal</th>
                                <th width="12%">Jam Datang</th>
                                <th width="12%">Jam Pulang</th>
                                <th width="10%">Status</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($absensi as $item)
                                <tr>
                                    <td>
                                        <span class="badge bg-light text-dark">#{{ $loop->iteration }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center me-2">
                                                <i class="bi bi-person text-white"></i>
                                            </div>
                                            <span class="fw-medium">{{ $item->nama_karyawan }}</span>
                                        </div>
                                    </td>
                                    <td>
                                    <span class="text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success">
                                            <i class="bi bi-clock me-1"></i>{{ $item->jam_datang }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($item->jam_pulang)
                                            <span class="badge bg-info bg-opacity-10 text-info">
                                                <i class="bi bi-clock-fill me-1"></i>{{ $item->jam_pulang }}
                                            </span>
                                        @else
                                            <span class="badge bg-warning bg-opacity-10 text-warning">
                                                <i class="bi bi-clock me-1"></i>Belum pulang
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status == 'Hadir')
                                            <span class="badge bg-success">
                                                <i class="bi bi-check-circle me-1"></i>{{ $item->status }}
                                            </span>
                                        @elseif($item->status == 'Izin')
                                            <span class="badge bg-warning">
                                                <i class="bi bi-exclamation-triangle me-1"></i>{{ $item->status }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                                <i class="bi bi-x-circle me-1"></i>{{ $item->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            @if(!$item->jam_pulang)
                                                <form action="{{ route('absensi.checkout', $item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success btn-sm" 
                                                            onclick="return confirm('Apakah Anda yakin ingin melakukan check-out?')"
                                                            title="Check-out">
                                                        <i class="bi bi-box-arrow-right"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="{{ route('absensi.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('absensi.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" 
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                        title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="bi bi-inbox display-4 d-block mb-3"></i>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>

<style>
.avatar-sm {
    width: 32px;
    height: 32px;
    font-size: 14px;
}
</style>
@endsection 