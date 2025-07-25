<div class="main-sidebar">
    <aside id="sidebar-wrapper" class="custom-sidebar">
        <div class="sidebar-brand mt-3">
            <img src="{{ URL::asset($pengaturan->logo) ?? 'https://via.placeholder.com/300' }}" alt=""
                style="width: 50px">
            <a href="">{{ $pengaturan->name ?? config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">{{ strtoupper(substr(config('app.name'), 0, 2)) }}</a>
        </div>
        <ul class="sidebar-menu">
            @if(Auth::check())
    <li class="mt-4 px-3">
        <form action="{{ route('set.periode') }}" method="POST">
            @csrf
            <label for="periode_id" class="text-white small mb-1">Periode Aktif</label>
            <select name="periode_id" class="form-control form-control-sm" onchange="this.form.submit()">
                @foreach (\App\Models\Periode::all() as $periode)
                    <option value="{{ $periode->id }}" {{ session('periode_terpilih') == $periode->id ? 'selected' : '' }}>
                        {{ $periode->nama }}
                    </option>
                @endforeach
            </select>
        </form>
    </li>
@endif
            <li class="menu-header">Dashboard</li>
            @if (Auth::check() && Auth::user()->roles == 'admin')
            <li class="{{ request()->routeIs('admin.dashboard.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.dashboard') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Master Data</li>

            <li class="{{ request()->routeIs('admin.proposal.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.proposal.list') }}"><i class="fas fa-book"></i> <span>Histori
                        Proposal</span></a></li>
            <li class="{{ request()->routeIs('admin.lpj.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.lpj.list') }}"><i class="fas fa-book"></i> <span>Histori LPJ</span></a></li>

            <li class="{{ request()->routeIs('admin.ormawa.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.ormawa.dana') }}">
                    <i class="fas fa-money-bill-wave"></i> <span>Atur Dana Proposal</span>
                </a>

                <li class="{{ request()->routeIs('admin.periode.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.periode.index') }}">
                    <i class="bi bi-calendar"></i> <span>Atur Periode</span>
                </a>
                <li class="{{ request()->routeIs('pengumuman.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('pengumuman.index') }}"><i class="fas fa-bullhorn"></i> <span>Pengumuman</span></a></li>

                {{--
            <li class="{{ request()->routeIs('kelas.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('kelas.index') }}"><i class="far fa-building"></i> <span>Kelas</span></a></li>

            <li class="{{ request()->routeIs('siswa.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('siswa.index') }}"><i class="fas fa-users"></i> <span>Siswa</span></a></li>

            <li class="{{ request()->routeIs('jadwal.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('jadwal.index') }}"><i class="fas fa-calendar"></i> <span>Jadwal</span></a></li> --}}

            <li class="{{ request()->routeIs('user.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('user.index') }}"><i class="fas fa-user"></i> <span>User</span></a></li>
            
           

            <li class="{{ request()->routeIs('pengaturan.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('pengaturan.index') }}"><i class="fas fa-cog"></i> <span>Pengaturan</span></a></li>

            @elseif (auth()->user()->roles == 'pembina')
            <li class="{{ request()->routeIs('pembina.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pembina.dashboard') }}">
                    <i class="fas fa-columns"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Master Data</li>
            <li class="{{ request()->routeIs('pembina.proposal.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pembina.proposal.index') }}">
                    <i class="fas fa-folder-open"></i> <span>Proposal Masuk</span>
                </a>
            </li>

            {{-- lpj --}}
            <li class="{{ request()->routeIs('pembina.lpj.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pembina.lpj.index') }}">
                    <i class="fas fa-folder-open"></i> <span>LPJ Masuk</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('pembina.keuangan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pembina.keuangan') }}">
                    <i class="fas fa-wallet"></i> <span>Keuangan Ormawa</span>
                </a>
            </li>
            @elseif (auth()->user()->roles == 'kaprodi')
            <li class="{{ request()->routeIs('kaprodi.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kaprodi.dashboard') }}">
                    <i class="fas fa-columns"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Master Data</li>
            <li class="{{ request()->routeIs('kaprodi.proposal.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kaprodi.proposal.index') }}">
                    <i class="fas fa-folder-open"></i> <span>Proposal Masuk</span>
                </a>
            </li>

            {{-- lpj --}}
            <li class="{{ request()->routeIs('kaprodi.lpj.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kaprodi.lpj.index') }}">
                    <i class="fas fa-folder-open"></i> <span>LPJ Masuk</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('kaprodi.keuangan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kaprodi.keuangan') }}">
                    <i class="fas fa-wallet"></i> <span>Keuangan Ormawa</span>
                </a>
            </li>

            @elseif (auth()->user()->roles == 'kemahasiswaan')
            <li class="{{ request()->routeIs('kemahasiswaan.proposal.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kemahasiswaan.dashboard') }}">
                    <i class="fas fa-columns"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Master Data</li>
            <li class="{{ request()->routeIs('kemahasiswaan.proposal.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kemahasiswaan.proposal.index') }}">
                    <i class="fas fa-folder-open"></i> <span>Proposal Masuk</span>
                </a>
            </li>

            {{-- lpj --}}
            <li class="{{ request()->routeIs('kemahasiswaan.lpj.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kemahasiswaan.lpj.index') }}">
                    <i class="fas fa-folder-open"></i> <span>LPJ Masuk</span>
                </a>
            </li>


            @elseif (auth()->user()->roles == 'wr3')
            <li class="{{ request()->routeIs('wr3.proposal.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('wr3.dashboard') }}">
                    <i class="fas fa-columns"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Master Data</li>
            <li class="{{ request()->routeIs('wr3.proposal.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('wr3.proposal.index') }}">
                    <i class="fas fa-folder-open"></i> <span>Proposal Masuk</span>
                </a>
            </li>

            {{-- lpj --}}
             <li class="{{ request()->routeIs('wr3.lpj.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('wr3.lpj.index') }}">
                    <i class="fas fa-folder-open"></i> <span>LPJ Masuk</span>
                </a>
            </li>

            @elseif (Auth::check() && Auth::user()->roles == 'ormawa')
            <li class="{{ request()->routeIs('ormawa.dashboard.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('ormawa.dashboard') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Master Data</li>
            <li
                class="nav-item dropdown {{ request()->routeIs('proposal.*') || request()->routeIs('ormawa.proposal') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>Proposal</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('proposal.form') ? 'active' : '' }}">
                        <a class="nav-link" style="background-color: #000080" href="{{ route('proposal.form') }}"><i
                                class="fa-solid fa-folder-open"></i>Pengajuan</a>
                    </li>
                    <li class="{{ request()->routeIs('ormawa.proposal') ? 'active' : '' }}">
                        <a class="nav-link" style="background-color: #000080" href="{{ route('ormawa.proposal') }}"><i
                                class="bi bi-clipboard-check-fill"></i>Status</a>
                    </li>
                </ul>
            </li>

            <li
                class="nav-item dropdown {{ request()->routeIs('lpj.*') || request()->routeIs('ormawa.lpj') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-invoice"></i> <span>LPJ</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('lpj.form') ? 'active' : '' }}">
                        <a class="nav-link" style="background-color: #000080" href="{{ route('lpj.form') }}"><i
                                class="fa-solid fa-folder-open"></i> Pengajuan</a>
                    </li>
                    <li class="{{ request()->routeIs('ormawa.lpj') ? 'active' : '' }}">
                        <a class="nav-link" style="background-color: #000080" href="{{ route('ormawa.lpj') }}"><i
                                class="bi bi-clipboard-check-fill"></i> Status</a>
                    </li>
                </ul>
            </li>

            <li
                class="nav-item dropdown {{ request()->routeIs('anggota.*') || request()->routeIs('absensi.index') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i> <span>Keanggotaan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('anggota.index') ? 'active' : '' }}">
                        <a class="nav-link" style="background-color: #000080" href="{{ route('anggota.index') }}"><i
                                class="bi bi-people-fill"></i>Data Anggota</a>
                    </li>
                    <li class="{{ request()->routeIs('absensi.index') ? 'active' : '' }}">
                        <a class="nav-link" style="background-color: #000080" href="{{ route('absensi.index') }}"><i
                                class="bi bi-person-check-fill"></i>Absensi</a>
                    </li>
                </ul>
            </li>
            <li
                class="nav-item dropdown {{ request()->routeIs('keuangan.*') || request()->routeIs('keuangan.index') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-wallet"></i> <span>Keuangan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('keuangan.index') ? 'active' : '' }}">
                        <a class="nav-link" style="background-color: #000080" href="{{ route('keuangan.index') }}"><i
                                class="bi bi-wallet-fill"></i>Catatan Keuangan</a>
                    </li>
                    <li class="{{ request()->routeIs('kas.anggota.index') ? 'active' : '' }}">
                        <a class="nav-link" style="background-color: #000080" href="{{ route('kas.anggota.index') }}"><i
                                class="fa-solid fa-money-bills"></i>Kas Anggota</a>
                    </li>
                </ul>
            </li>

            @else
            <li class="{{ request()->routeIs('orangtua.dashboard.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('orangtua.dashboard') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ request()->routeIs('orangtua.tugas.siswa') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('orangtua.tugas') }}"><i class="fas fa-list"></i> <span>Tugas</span></a></li>
            @endif

            


        </ul>
    </aside>
</div>