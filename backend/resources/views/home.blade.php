@extends('layouts.app')

@section('content')
<div class="row align-items-center min-vh-75 py-5">
    <div class="col-lg-6 mb-5 mb-lg-0">
        <span class="badge bg-primary px-3 py-2 rounded-pill mb-3 shadow-sm">AI-Powered Document Converter</span>
        <h1 class="fw-bold display-4 text-dark mb-4" style="line-height: 1.2;">Konversi Dokumen Lebih Cerdas dengan <span style="color: #0056b3;">SmartDoc AI</span></h1>
        <p class="lead text-muted mb-4 pe-lg-4">
            SmartDoc AI bukan sekadar alat konversi biasa. Sistem Kecerdasan Buatan kami memahami struktur dokumen Anda—mulai dari paragraf, tabel, hingga letak gambar—untuk memastikan hasil akhir yang rapi dan bebas dari pergeseran layout.
        </p>
        <div class="d-flex gap-3">
            <a href="{{ route('converter.index') }}" class="btn btn-primary btn-lg px-4 py-3 rounded-3 shadow hover-lift">
                <i class="fa-solid fa-wand-magic-sparkles me-2"></i> Mulai Konversi Sekarang
            </a>
            <a href="{{ route('converter.history') }}" class="btn btn-outline-secondary btn-lg px-4 py-3 rounded-3 hover-lift">
                <i class="fa-solid fa-clock-rotate-left me-2"></i> Riwayat
            </a>
        </div>
        <div class="mt-5 d-flex gap-4 text-muted small fw-bold">
            <div><i class="fa-solid fa-check text-success me-1"></i> Mendukung Word</div>
            <div><i class="fa-solid fa-check text-success me-1"></i> Mendukung PDF</div>
            <div><i class="fa-solid fa-check text-success me-1"></i> Mendukung Excel & PPT</div>
        </div>
    </div>
    
    <div class="col-lg-6 position-relative mt-5 mt-lg-0 float-animation">
        <!-- Dekorasi visual agar tidak terlihat kosong -->
        <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
            <div class="bg-primary text-white p-4 d-flex align-items-center justify-content-between">
                <h5 class="m-0 fw-bold"><i class="fa-solid fa-microchip me-2"></i> SmartDoc AI Engine</h5>
                <span class="spinner-grow spinner-grow-sm text-light" role="status"></span>
            </div>
            <div class="card-body p-4 bg-light">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-white p-3 rounded-circle shadow-sm me-3"><i class="fa-regular fa-file-word fa-2x text-primary"></i></div>
                    <i class="fa-solid fa-arrow-right-long text-muted mx-2"></i>
                    <div class="bg-white p-3 rounded-circle shadow-sm ms-3"><i class="fa-regular fa-file-pdf fa-2x text-danger"></i></div>
                </div>
                <div class="bg-white p-3 rounded border border-info mb-2">
                    <small class="text-info fw-bold"><i class="fa-solid fa-gear fa-spin me-1"></i> AI Analysis Running...</small>
                    <div class="progress mt-2" style="height: 5px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated w-75"></div>
                    </div>
                </div>
                <ul class="list-unstyled text-muted small mt-3 ms-1">
                    <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Menganalisis Heading & Paragraf</li>
                    <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Mengembalikan Layout Tabel</li>
                    <li><i class="fa-solid fa-check text-success me-2"></i> Menyesuaikan Resolusi Gambar</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
