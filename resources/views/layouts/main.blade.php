<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>@yield('title') | {{ $pengaturan->name ?? config('app.name') }}</title>
  <!-- AOS CSS -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <style>
    /* Sidebar utama */
.main-sidebar {
    height: 100vh;
    display: flex;
    flex-direction: column;
}

.custom-sidebar {
    flex: 1;
    display: flex;
    flex-direction: column;
    background-color: #000080 !important; /* Biru Navy */
}

.custom-sidebar .sidebar-menu li a,
.custom-sidebar .sidebar-brand a {
    color: #ffffff !important;
}

.custom-sidebar .sidebar-menu li.active > a {
    background-color: #0a0a5c !important; /* Biru Navy Muda */
    color: #fff !important;
}

.custom-sidebar .sidebar-menu li a:hover {
    background-color: #0a0a5c !important;
    color: #ffffff !important;
}

/* Tambahan: Dropdown di dalam sidebar */
.sidebar-menu .dropdown-menu {
    background-color: #000080 !important; /* Navy juga */
    border: none;
}

.sidebar-menu .dropdown-menu li a {
    color:rgb(255, 255, 255) !important;
}

.sidebar-menu .dropdown-menu li.active > a,
.sidebar-menu .dropdown-menu li a.active {
    background-color: #0a0a5c !important;
    color: #ffffff !important;
}

.sidebar-menu .dropdown-menu li a:hover {
    background-color: #0a0a5c !important;
    color: #ffffff !important;
}
.img-thumbnail {
        object-fit: cover;
        cursor: pointer;
        transition: transform 0.2s;
    }
    .img-thumbnail:hover {
        transform: scale(1.05);
    }
    .form-check-input {
        width: 1.2em;
        height: 1.2em;
    }
</style>

  {{-- Styling --}}
  @include('includes.style')
  @stack('style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg" style="background-color: #000080;"></div>
        {{-- Navbar --}}
        @include('partials.nav')


        {{-- Sidebar --}}
        @include('partials.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>

      {{-- Footer --}}
      @include('partials.footer')
    </div>
  </div>

  {{-- Scripts --}}
  @include('includes.script')
  @stack('script')
  <script>
    document.getElementById('pertemuanSelect').addEventListener('change', function() {
    let pertemuan = this.value;
    let tableBody = document.querySelector("#absensiTable tbody");

    // Hapus status lama
    Array.from(tableBody.rows).forEach(row => {
        let select = row.querySelector('select');
        select.name = `status[${row.cells[0].innerText}][${pertemuan}]`;
    });
});
</script>
</body>
</html>
