<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartDoc AI - Converter Sederhana</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome untuk ikon dummy -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff; /* AliceBlue - Soft blue background */
            font-family: 'Inter', sans-serif;
        }
        .navbar {
            background: linear-gradient(135deg, #0056b3, #007bff);
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.1);
        }
        .btn-primary {
            background-color: #0069d9;
            border-color: #0062cc;
            border-radius: 8px;
        }
        .dropzone {
            border: 2px dashed #007bff;
            border-radius: 12px;
            background-color: #e9f2ff;
            padding: 40px;
            text-align: center;
            color: #0056b3;
            transition: all 0.3s;
        }
        .dropzone:hover {
            background-color: #d0e4ff;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="fa-solid fa-file-pdf me-2"></i>SmartDoc AI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Converter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('converter.history') }}">Riwayat</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        @yield('content')
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
