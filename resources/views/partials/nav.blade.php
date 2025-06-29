<nav class="navbar navbar-expand-lg main-navbar" style="background-color: navy;">
    <form class="form-inline mr-auto" action="">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg text-white"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav ms-auto align-items-center">

    <!-- Notifikasi -->
    <li class="nav-item dropdown">
        <a id="notifDropdown" class="nav-link position-relative" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-bell fs-5"></i>
            @if(auth()->user()->unreadNotifications->count() > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ auth()->user()->unreadNotifications->count() }}
                </span>
            @endif
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow-sm p-2" aria-labelledby="notifDropdown" style="width: 300px;">
            <li class="dropdown-header fw-bold text-primary">Notifikasi</li>
            <hr class="my-1">
            @forelse(auth()->user()->unreadNotifications as $notif)
                <li>
                    <a class="dropdown-item text-wrap" href="{{ $notif->data['link'] }}">
                        <small>{{ $notif->data['message'] }}</small>
                    </a>
                </li>
            @empty
                <li>
                    <span class="dropdown-item text-muted"><small>Tidak ada notifikasi baru</small></span>
                </li>
            @endforelse
            <hr class="my-1">
            <li>
                <a class="dropdown-item text-center text-decoration-underline" href="{{ route('notifications.index') }}">
                    Lihat semua notifikasi
                </a>
            </li>
        </ul>
    </li>

    <!-- Profil -->
    <li class="nav-item dropdown ms-3">
        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li class="dropdown-header">Halo, {{ Auth::user()->name }}</li>
            <li>
                <a href="{{ route('profile') }}" class="dropdown-item">
                    <i class="far fa-user me-2"></i> Pengaturan Profil
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-2"></i> Log Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </li>

</ul>

</nav>
