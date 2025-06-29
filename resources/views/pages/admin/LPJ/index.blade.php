@extends('layouts.main')

@section('title', 'Daftar LPJ Masuk')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Daftar LPJ Menunggu Persetujuan Admin</h1>
    </div>

    <div class="section-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Daftar LPJ</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Judul Kegiatan</th>
                                <th>Status</th>
                                <th>File LPJ</th>
                                <th>File Revisi</th>
                                <th>Catatan Revisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lpjs as $lpj)
                                <tr>
                                    <td>{{ $lpj->judul_kegiatan }}</td>
                                    <td>
                                        @if ($lpj->status == 'pending_admin')
                                            <span class="badge bg-warning text-dark">Menunggu Admin</span>
                                        @elseif ($lpj->status == 'pending_pembina')
                                            <span class="badge bg-info text-dark">Diproses Pembina</span>
                                        @elseif ($lpj->status == 'pending_kemahasiswaan')
                                            <span class="badge bg-primary">Diproses Kemahasiswaan</span>
                                        @elseif ($lpj->status == 'revisi_admin')
                                            <span class="badge bg-danger">Perlu Revisi</span>
                                        @elseif ($lpj->status == 'acc')
                                            <span class="badge bg-success">Disetujui</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('lpj.viewPdf', ['id' => $lpj->id]) }}"
                                           class="btn btn-info btn-sm text-nowrap"
                                           >
                                            <i class="fas fa-file-pdf me-1"></i> View PDF
                                        </a>
                                    </td>
                                    <td>
                                        @if ($lpj->file_revisi)
                                            <a href="{{ asset($lpj->file_revisi) }}" class="btn btn-warning btn-sm" target="_blank" download>
                                                Download Revisi
                                            </a>
                                        @else
                                            <span class="text-muted">Belum Ada</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($lpj->catatan_revisi)
                                            {{ $lpj->catatan_revisi }}
                                        @else
                                            <span class="text-muted">Tidak Ada</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <!-- Tombol ACC -->
                                            <a href="{{ route('lpj.acc.admin', $lpj->id) }}" 
                                               class="btn btn-success btn-sm"
                                               onclick="return confirm('Yakin ingin ACC LPJ ini?');">
                                                ACC
                                            </a>

                                            <!-- Tombol Revisi -->
                                            <button type="button" 
                                                    class="btn btn-warning btn-sm"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modalRevisi{{ $lpj->id }}">
                                                Revisi
                                            </button>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('lpj.hapus', $lpj->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus LPJ ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Revisi -->
                                <div class="modal fade" id="modalRevisi{{ $lpj->id }}" tabindex="-1" aria-labelledby="modalRevisiLabel{{ $lpj->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('lpj.revisi.admin', $lpj->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalRevisiLabel{{ $lpj->id }}">Kirim Revisi LPJ</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="catatanRevisi{{ $lpj->id }}" class="form-label">Catatan Revisi</label>
                                                        <textarea name="catatan_revisi" id="catatanRevisi{{ $lpj->id }}" class="form-control" rows="3" required></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="fileRevisi{{ $lpj->id }}" class="form-label">Upload File Revisi</label>
                                                        <input type="file" name="file_revisi" id="fileRevisi{{ $lpj->id }}" class="form-control" accept=".docx,.pdf">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-warning">Kirim Revisi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada LPJ masuk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
