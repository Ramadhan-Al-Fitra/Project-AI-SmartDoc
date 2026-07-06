@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="text-center mb-5">
            <h1 class="fw-bold" style="color: #0056b3;">Konversi Dokumen dengan Kecerdasan Visual AI</h1>
            <p class="text-muted">SmartDoc AI memahami struktur, gambar, dan tabel dokumen Anda.</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card p-4">
            <form action="{{ route('converter.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="form-label fw-bold text-primary">Tipe Konversi</label>
                    <select name="conversion_type" class="form-select" required>
                        <option value="word_to_pdf">Word ke PDF</option>
                        <option value="pdf_to_word">PDF ke Word</option>
                        <option value="excel_to_pdf">Excel ke PDF</option>
                        <option value="powerpoint_to_pdf">PowerPoint ke PDF</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-primary">Unggah File</label>
                    <div class="dropzone" id="dropzone" onclick="document.getElementById('fileInput').click()">
                        <i class="fa-solid fa-cloud-arrow-up fa-3x mb-3"></i>
                        <h5>Klik atau Tarik File Kesini</h5>
                        <p class="text-muted small">Mendukung: .docx, .pdf, .xlsx, .pptx</p>
                    </div>
                    <input type="file" id="fileInput" name="file" style="display: none;">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fa-solid fa-wand-magic-sparkles me-2"></i> Konversi Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const fileInput = document.getElementById('fileInput');
    const dropzone = document.getElementById('dropzone');

    fileInput.addEventListener('change', function() {
        if(this.files.length > 0) {
            dropzone.innerHTML = `<i class="fa-solid fa-file-circle-check fa-3x mb-3 text-success"></i>
                                  <h5 class="text-success">${this.files[0].name}</h5>`;
        }
    });
</script>
@endsection
