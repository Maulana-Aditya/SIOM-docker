@extends('layouts.main')
@section('title', 'Keuangan Ormawa')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Keuangan Ormawa</h1>
    </div>

    <div class="mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-success">
                <strong>Total Pemasukan:</strong> Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="alert alert-danger">
                <strong>Total Pengeluaran:</strong> Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
            </div>
        </div>
    </div>
</div>

    <!-- Highlight Saldo -->
    <div class="alert alert-info text-center mb-4">
        <h5 class="mb-0"><strong>Saldo Saat Ini:</strong> Rp {{ number_format($saldo, 0, ',', '.') }}</h5>
    </div>

    <form method="GET" class="mb-4">
    <div class="row align-items-end">
        <div class="col-md-3">
            <label for="periode" class="form-label">Filter Periode Jabatan</label>
            <select name="periode" id="periode" class="form-select" onchange="this.form.submit()">
                <option value="">Semua Periode</option>
                @php
                    $startYear = 2025; // Periode awal 2025-2026
                    $endYear = now()->year + 1; // Bisa fleksibel tergantung tahun sekarang

                    for ($i = $startYear; $i <= $endYear; $i++) {
                        $startDate = "$i-01-01";
                        $endDate = ($i + 1) . "-01-01";
                        $periodeValue = "{$startDate}_{$endDate}";
                        $selected = request('periode') === $periodeValue ? 'selected' : '';
                        echo "<option value=\"{$periodeValue}\" {$selected}>{$i} - " . ($i + 1) . "</option>";
                    }
                @endphp
            </select>
        </div>
    </div>
</form>

    <!-- Tombol Export Excel di atas -->
    <a href="{{ route('keuangan.export') }}" class="btn btn-success mb-4"><i class="fa-solid fa-file-excel"></i> Export Excel</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Tambah -->
    <form action="{{ route('keuangan.store') }}" method="POST" class="row g-3 mb-4">
        @csrf
        <div class="col-md-3">
            <select name="jenis" class="form-select" required>
                <option value="">Pilih Jenis</option>
                <option value="pemasukan">Pemasukan</option>
                <option value="pengeluaran">Pengeluaran</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
        </div>
        <div class="col-md-2">
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="col-md-2">
            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah (Rp)" required>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>

    <!-- Tabel Keuangan -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Tanggal</th>
                    <th>Jenis</th>
                    <th>Keterangan</th>
                    <th>Jumlah (Rp)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ ucfirst($item->jenis) }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                    <td class="text-center">
                        <!-- Tombol Edit Modal -->
                        <button class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('keuangan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus transaksi ini?');" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                
                <!-- Modal Edit -->
                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Transaksi Keuangan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('keuangan.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="mb-3">
                                        <label for="jenis" class="form-label">Jenis</label>
                                        <select name="jenis" class="form-select" required>
                                            <option value="pemasukan" {{ $item->jenis == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                                            <option value="pengeluaran" {{ $item->jenis == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" value="{{ $item->keterangan }}" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" value="{{ $item->tanggal }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="number" name="jumlah" class="form-control" value="{{ $item->jumlah }}" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
