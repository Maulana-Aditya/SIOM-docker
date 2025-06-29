<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIOM - Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">SIOM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="#beranda">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
        <li class="nav-item">
            <a class="btn btn-primary ms-2" href="{{ route('login') }}">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero bg-light text-center py-5">
  <div class="container">
    <h1 class="display-4">Selamat Datang di <strong>SIOM</strong></h1>
    <p class="lead mb-4">Sistem Informasi Organisasi Mahasiswa</p>
    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Masuk ke Sistem</a>
  </div>
</section>

<!-- Tentang Section -->
<section id="tentang" class="py-5">
  <div class="container text-center">
    <h2 class="mb-4">Tentang SIOM</h2>
    <p class="text-muted">SIOM adalah platform untuk mempermudah pengajuan proposal, administrasi akademik, serta layanan digital untuk mahasiswa.</p>
  </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
  <small>&copy; 2025 SIOM - ITSK Soepraoen. All rights reserved.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
