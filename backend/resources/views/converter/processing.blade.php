@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8 text-center">
        <h3 class="fw-bold text-primary mb-4">SmartDoc AI sedang bekerja...</h3>
        
        <div class="card p-5 border-primary shadow-sm">
            <div class="d-flex justify-content-center mb-4">
                <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            
            <h4 id="status-text" class="text-secondary transition-fade">Membaca file {{ $history->original_filename }}...</h4>
            
            <div class="progress mt-4" style="height: 25px;">
                <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
            </div>
            
            <ul class="list-group list-group-flush mt-4 text-start w-75 mx-auto" id="process-list">
                <li class="list-group-item" id="step-1"><i class="fa-solid fa-spinner fa-spin text-primary me-2"></i> Ekstraksi Teks dan Metadata</li>
                <li class="list-group-item text-muted" id="step-2"><i class="fa-regular fa-clock me-2"></i> AI Document Analysis</li>
                <li class="list-group-item text-muted" id="step-3"><i class="fa-regular fa-clock me-2"></i> Layout Detection & Formatting</li>
                <li class="list-group-item text-muted" id="step-4"><i class="fa-regular fa-clock me-2"></i> Konversi ke {{ explode('_to_', $history->type_conversion)[1] ?? 'format tujuan' }}</li>
            </ul>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const statusText = document.getElementById('status-text');
        const progressBar = document.getElementById('progress-bar');
        
        const step1 = document.getElementById('step-1');
        const step2 = document.getElementById('step-2');
        const step3 = document.getElementById('step-3');
        const step4 = document.getElementById('step-4');

        setTimeout(() => {
            progressBar.style.width = '35%';
            progressBar.innerHTML = '35%';
            statusText.innerText = "Menganalisis struktur dokumen (Heading, Tabel, List)...";
            
            step1.innerHTML = '<i class="fa-solid fa-check text-success me-2"></i> Ekstraksi Teks dan Metadata';
            step1.classList.remove('text-primary');
            
            step2.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-primary me-2"></i> AI Document Analysis';
            step2.classList.remove('text-muted');
        }, 1500);

        setTimeout(() => {
            progressBar.style.width = '65%';
            progressBar.innerHTML = '65%';
            statusText.innerText = "Merekonstruksi layout agar tidak berantakan...";
            
            step2.innerHTML = '<i class="fa-solid fa-check text-success me-2"></i> AI Document Analysis';
            
            step3.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-primary me-2"></i> Layout Detection & Formatting';
            step3.classList.remove('text-muted');
        }, 3500);

        setTimeout(() => {
            progressBar.style.width = '90%';
            progressBar.innerHTML = '90%';
            statusText.innerText = "Menyelesaikan proses konversi...";
            
            step3.innerHTML = '<i class="fa-solid fa-check text-success me-2"></i> Layout Detection & Formatting';
            
            step4.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-primary me-2"></i> Konversi Final';
            step4.classList.remove('text-muted');
        }, 5500);

        setTimeout(() => {
            progressBar.style.width = '100%';
            progressBar.innerHTML = '100%';
            window.location.href = "{{ route('converter.process_complete', $history->id) }}";
        }, 7000);
    });
</script>
@endsection
