@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Anggota</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('anggota.store') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Divisi / Kementrian</label>
                    <input type="text" name="prodi" class="form-control">
                </div>
                <button class="btn btn-primary mt-2">Tambah Anggota</button>
            </form>
        </div>

        <div class="col-md-6">
            <form action="{{ route('anggota.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label>Import dari Excel</label>
                    <input type="file" name="file" class="form-control" required>
                </div>
                <button class="btn btn-success mt-2"><i class="fa-solid fa-file-excel"></i> Import Excel</button>
            </form>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Divisi / Kementrian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anggotas as $i => $anggota)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $anggota->nama }}</td>
                    <td>{{ $anggota->nim }}</td>
                    <td>{{ $anggota->prodi }}</td>
                    <td class="text-center">
                        <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
