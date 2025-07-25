@extends('layouts.auth')

@section('title', 'Pengumuman')

@section('content')
<section class="py-5" style="min-height: 100vh; background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(4px);">
    <div class="container text-white">
        <h2 class="text-center font-weight-bold mb-5">Pengumuman</h2>

        {{-- Filter Bar --}}
        <div class="row justify-content-center mb-4">
            <div class="col-md-4 mb-2 mb-md-0">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari Judul Pengumuman">
            </div>
            <div class="col-md-3 mb-2 mb-md-0">
                <select class="form-control bg-dark text-white" id="sortSelect">
                    <option value="desc">Terbaru</option>
                    <option value="asc">Terlama</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-warning w-100" onclick="filterPengumuman()">
                    <i class="fas fa-filter"></i> Cari
                </button>
            </div>
        </div>

        {{-- List Pengumuman --}}
        <div class="row justify-content-center" id="pengumumanList">
            @forelse ($pengumumans as $pengumuman)
                <div class="col-12 mb-4 pengumuman-item"
                     data-judul="{{ strtolower($pengumuman->judul) }}"
                     data-tanggal="{{ $pengumuman->created_at }}">
                    <div class="card shadow bg-dark text-white h-100">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold mb-1">{{ $pengumuman->judul }}</h5>
                            <small class="text-muted d-block mb-2">Oleh Admin | {{ $pengumuman->created_at->format('d M Y') }}</small>
                            <p class="text-light">{{ $pengumuman->deskripsi ?? 'Tidak Ada Deskripsi' }}</p>
                            
                            @if ($pengumuman->file_path)
                                <a href="{{ asset('storage/' . $pengumuman->file_path) }}" target="_blank" class="btn btn-sm btn-outline-light">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-light">Tidak ada pengumuman tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function filterPengumuman() {
        const search = document.getElementById('searchInput').value.toLowerCase();
        const sort = document.getElementById('sortSelect').value;
        const items = Array.from(document.querySelectorAll('.pengumuman-item'));

        items.forEach(item => {
            const judul = item.getAttribute('data-judul');
            item.style.display = judul.includes(search) ? 'block' : 'none';
        });

        const list = document.getElementById('pengumumanList');
        const visibleItems = items.filter(item => item.style.display === 'block');
        visibleItems.sort((a, b) => {
            const t1 = new Date(a.getAttribute('data-tanggal'));
            const t2 = new Date(b.getAttribute('data-tanggal'));
            return sort === 'asc' ? t1 - t2 : t2 - t1;
        });

        visibleItems.forEach(item => list.appendChild(item));
    }
</script>
@endpush
