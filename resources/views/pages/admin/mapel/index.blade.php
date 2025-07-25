@extends('layouts.main')

@section('title', 'Daftar Proposal Masuk')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Daftar Proposal Menunggu Persetujuan Admin</h1>
    </div>

    <div class="section-body">

        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Filter Form --}}
        <div class="card mb-3">
            <div class="card-body">
                <form method="GET" action="{{ route('admin.proposal.list') }}">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <label for="search" class="form-label">Cari Judul</label>
                            <input type="text" name="search" id="search" value="{{ request('search') }}" class="form-control" placeholder="Masukkan judul...">
                        </div>

                        <div class="col-md-3">
                            <label for="status" class="form-label">Filter Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="">-- Semua Status --</option>
                                <option value="pending_admin" {{ request('status') == 'pending_admin' ? 'selected' : '' }}>Menunggu Admin</option>
                                <option value="pending_pembina" {{ request('status') == 'pending_pembina' ? 'selected' : '' }}>Diproses Pembina</option>
                                <option value="pending_kemahasiswaan" {{ request('status') == 'pending_kemahasiswaan' ? 'selected' : '' }}>Diproses Kemahasiswaan</option>
                                <option value="revisi_admin" {{ request('status') == 'revisi_admin' ? 'selected' : '' }}>Revisi Admin</option>
                                <option value="revisi_pembina" {{ request('status') == 'revisi_pembina' ? 'selected' : '' }}>Revisi Pembina</option>
                                <option value="acc" {{ request('status') == 'acc' ? 'selected' : '' }}>Disetujui</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="tanggal" class="form-label">Tanggal Pengajuan</label>
                            <input type="date" name="tanggal" id="tanggal" value="{{ request('tanggal') }}" class="form-control">
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary w-100" type="submit">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Data Table --}}
        <div class="card">
            <div class="card-header">
                <h4>Daftar Proposal</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Judul Kegiatan</th>
                                <th>Pengusul</th>
                                <th>Status</th>
                                <th>File Proposal</th>
                                <th>File Revisi</th>
                                <th>Catatan Revisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($proposals as $proposal)
                                <tr>
                                    <td>{{ $proposal->judul_kegiatan }}</td>
                                    <td>{{ $proposal->user->name }}</td>
                                    <td>
                                        @if ($proposal->status == 'pending_admin')
                                            <span class="badge bg-warning text-dark">Menunggu Admin</span>
                                        @elseif ($proposal->status == 'pending_pembina')
                                            <span class="badge bg-info text-dark">Diproses Pembina</span>
                                        @elseif ($proposal->status == 'pending_kemahasiswaan')
                                            <span class="badge bg-primary">Diproses Kemahasiswaan</span>
                                        @elseif ($proposal->status == 'revisi_admin')
                                            <span class="badge bg-danger">Perlu Revisi</span>
                                        @elseif ($proposal->status == 'revisi_pembina')
                                            <span class="badge bg-danger">Revisi Pembina</span>
                                        @elseif ($proposal->status == 'acc')
                                            <span class="badge bg-success">Disetujui</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('proposal.viewPdf', $proposal->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-file-pdf me-1"></i> View PDF
                                        </a>
                                    </td>
                                    <td>
                                        @if ($proposal->file_revisi)
                                            <a href="{{ asset($proposal->file_revisi) }}" class="btn btn-warning btn-sm" target="_blank" download>Download Revisi</a>
                                        @else
                                            <span class="text-muted">Belum Ada</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $proposal->catatan_revisi ?? '-' }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('proposal.acc.admin', $proposal->id) }}" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin ACC proposal ini?');">ACC</a>

                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalRevisi{{ $proposal->id }}">Revisi</button>

                                            <form action="{{ route('proposal.hapus', $proposal->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus proposal ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Modal Revisi --}}
                                <div class="modal fade" id="modalRevisi{{ $proposal->id }}" tabindex="-1" aria-labelledby="modalRevisiLabel{{ $proposal->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('proposal.revisi.admin', $proposal->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Kirim Revisi Proposal</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Catatan Revisi</label>
                                                        <textarea name="catatan_revisi" class="form-control" rows="3" required></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Upload File Revisi</label>
                                                        <input type="file" name="file_revisi" class="form-control" accept=".pdf,.docx">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-warning">Kirim</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada proposal masuk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-3">
                    {{ $proposals->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

