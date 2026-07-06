@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold m-0" style="color: #0056b3;">Detail Analisis AI</h2>
            <a href="{{ route('converter.history') }}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        </div>

        <div class="card p-4 border-primary shadow-sm mb-4">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="text-primary fw-bold border-bottom pb-2">Informasi Dokumen</h5>
                    <table class="table table-borderless mt-3">
                        <tr>
                            <td class="text-muted" width="40%">Nama File Asli</td>
                            <td class="fw-bold">{{ $history->original_filename }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Tipe Konversi</td>
                            <td><span class="badge bg-primary">{{ strtoupper(str_replace('_', ' ', $history->type_conversion)) }}</span></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Ukuran File</td>
                            <td>{{ $history->file_size_kb }} KB</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Waktu Konversi</td>
                            <td>{{ $history->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5 class="text-primary fw-bold border-bottom pb-2">Status AI</h5>
                    <div class="mt-3 text-center p-4 bg-light rounded">
                        @if($history->status == 'success')
                            <i class="fa-solid fa-circle-check text-success fa-3x mb-2"></i>
                            <h4 class="text-success fw-bold">Konversi Berhasil</h4>
                            <a href="{{ route('converter.download', $history->id) }}" class="btn btn-success mt-2"><i class="fa-solid fa-download me-1"></i> Unduh {{ $history->converted_filename }}</a>
                        @else
                            <i class="fa-solid fa-spinner fa-spin text-warning fa-3x mb-2"></i>
                            <h4 class="text-warning fw-bold">Sedang Diproses</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-4 shadow-sm">
            <h4 class="text-primary fw-bold mb-4"><i class="fa-solid fa-robot me-2"></i>Laporan Kinerja AI</h4>
            
            <div class="mb-4">
                <h5 class="fw-bold"><i class="fa-solid fa-magnifying-glass-chart text-info me-2"></i>1. Analisis Permasalahan & Struktur</h5>
                <div class="p-3 bg-light rounded border-start border-info border-4 mt-2">
                    <p class="mb-0 text-dark">
                        Berdasarkan pemindaian <strong>AI Document Analysis</strong>, berikut adalah struktur yang berhasil dipetakan dari dokumen Anda sebelum proses konversi dilakukan:
                    </p>
                    <div class="mt-3 text-muted">
                        {!! nl2br(e($history->ai_summary)) !!}
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <h5 class="fw-bold"><i class="fa-solid fa-wand-magic-sparkles text-warning me-2"></i>2. Solusi AI & Tindakan</h5>
                <ul class="list-group list-group-flush mt-2 border rounded">
                    <li class="list-group-item"><i class="fa-solid fa-check text-success me-2"></i> <strong>AI Layout Recovery:</strong> Mencegah pergeseran margin saat format diubah.</li>
                    <li class="list-group-item"><i class="fa.solid fa-check text-success me-2"></i> <strong>AI Smart Formatting:</strong> Menyesuaikan ukuran font dan penempatan gambar.</li>
                    <li class="list-group-item"><i class="fa.solid fa-check text-success me-2"></i> <strong>AI Table Detection:</strong> Mengunci grid tabel agar tidak pecah.</li>
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection
