<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SIOM - Sistem Informasi Organisasi Mahasiswa</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
    /* === CSS RESET & UTAMA === */
    :root {
      --primary-color:rgb(255, 255, 255);
      --dark-blue: #0a0a5c;
      --light-text: #e0e0e0;
      --white-color: #ffffff;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 51, 0.9)), url('assets/img/itsk.jpeg.jpg') no-repeat center center fixed;
      background-size: cover;
      color: var(--white-color);
      scroll-behavior: smooth;
    }

    body.menu-open {
      overflow: hidden; /* Mencegah scroll saat menu mobile terbuka */
    }

    /* === NAVIGASI === */
    .nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 5%; /* Menggunakan % agar lebih fleksibel */
      background-color: #0a0a5c;
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
      transition: background-color 0.3s ease;
    }

    .logo {
      font-weight: 700;
      font-size: 1.5rem; /* Menggunakan rem untuk skalabilitas */
      color: var(--primary-color);
    }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 25px; /* Menggunakan gap untuk spasi antar item */
    }

    .nav-links a {
      color: var(--white-color);
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .nav-links a:hover {
      color: var(--primary-color);
    }

    .search-box {
      padding: 6px 12px;
      border-radius: 20px;
      border: 1px solid transparent;
      font-size: 14px;
      transition: border-color 0.3s;
    }

    .search-box:focus {
        outline: none;
        border-color: var(--primary-color);
    }

    .btn-primary {
      background-color: var(--primary-color);
      color: #000;
      padding: 8px 20px;
      border-radius: 20px;
      font-weight: bold;
      text-decoration: none;
      transition: background-color 0.3s, color 0.3s;
    }

    .btn-primary:hover {
      background-color: #00b8d4;
      color: var(--white-color);
    }
    
    /* === MENU TOGGLE (HAMBURGER) === */
    .menu-toggle {
      display: none; /* Sembunyi di desktop */
      flex-direction: column;
      justify-content: space-around;
      width: 30px;
      height: 25px;
      cursor: pointer;
      z-index: 1002; /* Di atas overlay nav */
    }

    .menu-toggle div {
      width: 100%;
      height: 3px;
      background-color: var(--white-color);
      transition: all 0.3s ease;
    }
    
    /* Animasi hamburger menjadi 'X' */
    .menu-toggle.open .bar1 {
        transform: rotate(-45deg) translate(-7px, 6px);
    }
    .menu-toggle.open .bar2 {
        opacity: 0;
    }
    .menu-toggle.open .bar3 {
        transform: rotate(45deg) translate(-7px, -6px);
    }

    /* === HERO SECTION === */
    .hero {
      min-height: 100vh; /* Memastikan hero section memenuhi layar */
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 120px 5%; /* Padding atas/bawah & samping lebih fleksibel */
      max-width: 800px;
    }

    .hero h1 {
      /* Ukuran font yang fluid, menyesuaikan lebar layar */
      font-size: clamp(2.5rem, 5vw, 3.25rem);
      font-weight: 700;
      margin-bottom: 20px;
      line-height: 1.2;
    }

    .hero p {
      font-size: clamp(1rem, 2.5vw, 1.125rem);
      color: var(--light-text);
      margin-bottom: 40px;
      max-width: 600px; /* Batasi lebar paragraf agar mudah dibaca */
    }

    .hero .buttons {
        display: flex;
        flex-wrap: wrap; /* Izinkan tombol turun ke baris baru jika perlu */
        gap: 16px;
    }

    .hero .buttons a {
      padding: 14px 28px;
      border-radius: 6px;
      font-weight: 600;
      text-decoration: none;
      display: inline-block;
      text-align: center;
    }
    
    .btn-secondary {
      border: 2px solid var(--white-color);
      background: transparent;
      color: var(--white-color);
      transition: background-color 0.3s;
    }

    .btn-secondary:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    /* === FOOTER === */
    .site-footer {
        background-color: #0a0a5c;
        padding: 60px 5% 20px; /* Padding fleksibel */
        margin-top: 100px;
        color: var(--white-color);
    }
    
    .footer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 40px;
        margin-bottom: 40px;
    }
    
    .footer-column {
        flex: 1;
        min-width: 200px; /* Lebar minimum untuk setiap kolom */
    }

    .footer-column h3 {
        margin-bottom: 15px;
        color: var(--primary-color);
    }

    .footer-column p, .footer-column h4 {
        margin-bottom: 10px;
        font-size: 0.9rem;
        color: var(--light-text);
    }
    
    .footer-column a {
        color: var(--light-text);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-column a:hover {
        color: var(--primary-color);
    }

    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        padding-top: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .social-links {
        display: flex;
        gap: 15px;
    }

    .social-links a img {
        transition: transform 0.3s ease;
    }
    
    .social-links a:hover img {
        transform: scale(1.2);
    }
    
    .copyright-text {
        font-size: 0.85rem;
        color: #aaa;
        text-align: center;
        flex-grow: 1; /* Agar teks copyright bisa ditengah jika ada ruang */
    }


    /* === MEDIA QUERIES UNTUK RESPONSIVE === */
    @media (max-width: 992px) {
      .hero {
        max-width: 100%;
        text-align: center;
        align-items: center;
      }
      .hero p {
        max-width: 100%;
      }
    }

    @media (max-width: 768px) {
      .menu-toggle {
        display: flex; /* Tampilkan hamburger menu */
      }

      .nav-links {
        /* Jadikan overlay yang muncul dari kanan */
        position: fixed;
        top: 0;
        right: -100%; /* Mulai dari luar layar */
        width: 70%;
        max-width: 300px;
        height: 100vh;
        background-color: var(--dark-blue);
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 30px;
        transition: right 0.4s ease-in-out;
        padding: 20px;
      }

      .nav-links.show {
        right: 0; /* Pindahkan ke dalam layar */
      }
      
      .nav-links .search-box, .nav-links .btn-primary {
          width: 80%;
          text-align: center;
      }
      
      .hero .buttons {
        justify-content: center;
      }
      .hero .buttons a {
          width: 70%;
          max-width: 250px;
      }
      
      .footer-bottom {
          flex-direction: column;
      }
      .copyright-text {
          order: 1; /* Pindahkan copyright ke bawah ikon sosial */
      }
    }
  </style>
</head>
<body>

  <nav class="nav">
    <div class="logo">SIOM SOEPRAOEN</div>
    <div class="nav-links" id="nav-links">
      <a href="{{ url('/') }}">Home</a>
 
      <a href="{{ url('/about') }}">Tentang</a>
      <a href="{{ url('/services') }}">Service</a>
      <a href="{{ url('/help') }}">Bantuan</a>
      
      
    </div>
    <div class="menu-toggle" id="menu-toggle">
      <div class="bar1"></div>
      <div class="bar2"></div>
      <div class="bar3"></div>
    </div>
  </nav>

  <main class="hero" data-aos="fade-up">
    <h1>Creating your future<br>with student organizations<br>in a better way.</h1>
    <p>SIOM membantu mengelola kegiatan organisasi mahasiswa secara digital, transparan, dan efisien.</p>
    <div class="buttons">
  @guest
    <a href="{{ route('login') }}" class="btn-primary">Log in</a>
    <a href="{{ url('/about') }}" class="btn-secondary">Learn More</a>
  @else
    @php
      $role = Auth::user()->roles;
      $dashboardRoute = match($role) {
          'admin'   => route('admin.dashboard'),
          'ormawa'   => route('ormawa.dashboard'),
          'pembina' => route('pembina.dashboard'),
          'kaprodi'   => route('kaprodi.dashboard'),
          'kemahasiswaan' => route('kemahasiswaan.dashboard'),
          'wr3' => route('wr3.dashboard'),
          default => url('/home'),
      };
    @endphp

    <a href="{{ $dashboardRoute }}" class="btn-primary">Beranda</a>
  @endguest
</div>

  </main>

  <footer class="site-footer">
    <div class="footer-container">
      <div class="footer-column">
        <h3>SIOM - Sistem Informasi Organisasi Mahasiswa</h3>
        <p><strong>ITSK RS dr. Soepraoen Malang</strong></p>
        <p><strong>Alamat:</strong><br>Jl. S. Supriadi No.22, Sukun, Kota Malang, Jawa Timur, 65147</p>
        <p><strong>Kontak:</strong> +62 851-7523-5522</p>
        <p><strong>Email:</strong> siom@itsk-soepraoen.ac.id</p>
      </div>

      <div class="footer-column">
        <h3>Tentang</h3>
        <h4><a href="#">Visi & Misi</a></h4>
        <h4><a href="#">Tim Pengembang</a></h4>
        <h4><a href="#">Dokumentasi</a></h4>
      </div>
      <div class="footer-column">
        <h3>Fitur</h3>
        <h4><a href="#">Manajemen Organisasi</a></h4>
        <h4><a href="#">Agenda Kegiatan</a></h4>
        <h4><a href="#">Laporan & Arsip</a></h4>
      </div>
      <div class="footer-column">
        <h3>Organisasi</h3>
        <h4><a href="#">BEM</a></h4>
        <h4><a href="#">UKM & Himpunan</a></h4>
        <h4><a href="#">Forum Mahasiswa</a></h4>
      </div>
      <div class="footer-column">
        <h3>Bantuan</h3>
        <h4><a href="#">FAQ</a></h4>
        <h4><a href="#">Panduan Penggunaan</a></h4>
        <h4><a href="#">Hubungi Admin</a></h4>
      </div>
    </div>
    
    <div class="footer-bottom">
        <div class="social-links">
          <a href="#"><img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/instagram.svg" width="22" style="filter: invert(1);" /></a>
          <a href="#"><img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/linkedin.svg" width="22" style="filter: invert(1);" /></a>
          <a href="#"><img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/youtube.svg" width="22" style="filter: invert(1);" /></a>
          <a href="#"><img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/github.svg" width="22" style="filter: invert(1);" /></a>
          <a href="#"><img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/gmail.svg" width="22" style="filter: invert(1);" /></a>
          <a href="#"><img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/whatsapp.svg" width="22" style="filter: invert(1);" /></a>
          <a href="#"><img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/tiktok.svg" width="22" style="filter: invert(1);" /></a>
        </div>
        <div class="copyright-text">
          &copy; 2025 SIOM. All rights reserved. Developed by SIOM Soepraoen
        </div>
    </div>
  </footer>

  <script>
    // Modern JavaScript untuk toggle menu
    const menuToggle = document.getElementById('menu-toggle');
    const navLinks = document.getElementById('nav-links');
    const body = document.body;

    menuToggle.addEventListener('click', () => {
      navLinks.classList.toggle('show');
      menuToggle.classList.toggle('open');
      body.classList.toggle('menu-open');
    });
  </script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true,
      offset: 50 // Animasi trigger lebih cepat
    });
  </script>

</body>
</html>