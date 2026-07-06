@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h2 class="fw-bold mb-4" style="color: #0056b3;">Riwayat Konversi</h2>
        
        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light text-primary">
                        <tr>
                            <th>ID</th>
                            <th>Nama File Asli</th>
                            <th>Tipe Konversi</th>
                            <th>Ukuran</th>
                            <th>Status</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($histories as $history)
                        <tr>
                            <td>#{{ $history->id }}</td>
                            <td>
                                <i class="fa-solid fa-file-lines text-muted me-2"></i> 
                                {{ $history->original_filename }}
                            </td>
                            <td><span class="badge bg-info text-dark">{{ strtoupper(str_replace('_', ' ', $history->type_conversion)) }}</span></td>
                            <td>{{ $history->file_size_kb }} KB</td>
                            <td>
                                @if($history->status == 'success')
                                    <span class="badge bg-success"><i class="fa-solid fa-check me-1"></i> Selesai</span>
                                @elseif($history->status == 'failed')
                                    <span class="badge bg-danger"><i class="fa-solid fa-xmark me-1"></i> Gagal</span>
                                @else
                                    <span class="badge bg-warning text-dark"><i class="fa-solid fa-spinner fa-spin me-1"></i> Proses</span>
                                @endif
                            </td>
                            <td class="text-muted small">{{ $history->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <a href="{{ route('converter.preview', $history->id) }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                Belum ada riwayat konversi dokumen.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
