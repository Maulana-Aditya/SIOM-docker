@extends('layouts.main')

@section('content')
<div class="container"><br><br><br>
    <h4>Manajemen Periode</h4><br>

    <!-- Tombol untuk buka modal -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahPeriode">
        Tambah Periode
    </button>

    <!-- Tabel daftar periode -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periodes as $periode)
            <tr>
                <td>{{ $periode->nama }}</td>
                <td>
                    @if($periode->is_active)
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-secondary">Tidak Aktif</span>
                    @endif
                </td>
                <td>
                    @if(!$periode->is_active)
                        <form action="{{ route('admin.periode.aktifkan', $periode->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-outline-success">Set Aktif</button>
                        </form>
                    @endif
                    <form action="{{ route('admin.periode.destroy', $periode->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus periode ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah Periode -->
<div class="modal fade" id="modalTambahPeriode" tabindex="-1" aria-labelledby="modalTambahPeriodeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.periode.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahPeriodeLabel">Tambah Periode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Periode</label>
                    <input type="text" name="nama" class="form-control" id="nama" required placeholder="Contoh: 2024/2025">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1">
                    <label class="form-check-label" for="is_active">
                        Jadikan periode aktif
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
