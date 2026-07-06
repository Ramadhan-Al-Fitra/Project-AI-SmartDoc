@extends('layouts.app')

@section('content')
<div class="row mt-4">
    <div class="col-12 text-center mb-4">
        <h2 class="fw-bold" style="color: #0056b3;">Pratinjau Hasil Konversi</h2>
    </div>

    @if(session('success'))
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    <div class="col-md-6">
        <div class="card p-4 h-100 border-primary" style="border-left: 5px solid #007bff;">
            <h4 class="text-primary mb-4"><i class="fa-solid fa-robot me-2"></i>Ringkasan Analisis AI</h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Nama File Asli:
                    <span class="badge bg-secondary rounded-pill">{{ $history->original_filename }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Ukuran File:
                    <span class="badge bg-secondary rounded-pill">{{ $history->file_size_kb }} KB</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Tipe Konversi:
                    <span class="badge bg-primary rounded-pill">{{ strtoupper(str_replace('_', ' ', $history->type_conversion)) }}</span>
                </li>
            </ul>
            <div class="mt-4 p-3 bg-light rounded text-start">
                <strong><i class="fa-solid fa-magnifying-glass-chart text-info me-2"></i>Hasil AI:</strong>
                <p class="mb-0 mt-2 text-muted">{!! nl2br(e($history->ai_summary ?? 'Tidak ada data summary.')) !!}</p>
            </div>
        </div>
    </div>

    <div class="col-md-6 mt-4 mt-md-0">
        <div class="card p-4 h-100 text-center d-flex flex-column justify-content-center align-items-center">
            @if($history->status == 'success')
                <div class="mb-4">
                    <i class="fa-solid fa-file-circle-check text-success" style="font-size: 5rem;"></i>
                </div>
                <h3 class="text-success fw-bold">Berhasil!</h3>
                <p class="text-muted">File dokumen Anda telah dikonversi dan diformat ulang dengan rapi.</p>
                <a href="#" class="btn btn-success btn-lg mt-3 w-100" onclick="alert('Download file: {{ $history->converted_filename }} (Fitur dummy)')">
                    <i class="fa-solid fa-download me-2"></i> Unduh {{ $history->converted_filename }}
                </a>
            @else
                <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <h4 class="mt-4 text-primary">AI sedang memproses...</h4>
            @endif
        </div>
    </div>
</div>
@endsection
