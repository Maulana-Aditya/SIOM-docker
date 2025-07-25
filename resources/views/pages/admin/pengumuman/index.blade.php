@extends('layouts.main')

@section('title', 'Data Pengumuman')

@section('content')
<section class="section">
    <div class="section-header d-flex justify-content-between w-100">
        <h1>Daftar Pengumuman</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalPengumuman">
            <i class="fas fa-plus"></i> Tambah Pengumuman
        </button>
    </div>

    <div class="section-body">
        @include('partials.alert')

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>File</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengumumans as $pengumuman)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengumuman->judul }}</td>
                        <td>{{ $pengumuman->deskripsi }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $pengumuman->file_path) }}" target="_blank" class="btn btn-sm btn-info">
                                <i class="fas fa-download"></i> Download
                            </a>
                        </td>
                        <td>{{ $pengumuman->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('pengumuman.edit', $pengumuman->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('pengumuman.destroy', $pengumuman->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pengumuman ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($pengumumans->isEmpty())
                    <tr><td colspan="6" class="text-center">Belum ada pengumuman.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>

{{-- Modal Tambah Pengumuman --}}
<div class="modal fade" id="modalPengumuman" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pengumuman</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label>File Pengumuman (PDF)</label>
            <input type="file" name="file" accept=".pdf" class="form-control-file" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection
