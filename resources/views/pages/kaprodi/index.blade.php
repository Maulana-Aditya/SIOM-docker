@extends('layouts.main')

@section('title', 'Proposal Masuk')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Proposal Masuk</h1>
    </div>

    <div class="section-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="container mt-4">
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Judul Kegiatan</th>
                        <th>Proposal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proposals as $proposal)
                        <tr>
                            <td>{{ $proposal->judul_kegiatan }}</td>
                            <td class="text-center">
    <a href="{{ route('proposal.viewPdf', ['id' => $proposal->id]) }}"
       class="btn btn-info btn-sm text-nowrap"
       >
        <i class="fas fa-file-pdf me-1"></i> View PDF
    </a>
</td>
                            <td>
                                <form action="{{ route('kaprodi.proposal.acc', $proposal->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">ACC</button>
                                </form>

                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalRevisi{{ $proposal->id }}">Revisi</button>
                            </td>
                        </tr>

                        <!-- Modal Revisi -->
<div class="modal fade" id="modalRevisi{{ $proposal->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $proposal->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('kaprodi.proposal.revisi', $proposal->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel{{ $proposal->id }}">Revisi Proposal: {{ $proposal->judul_kegiatan }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file_revisi{{ $proposal->id }}" class="form-label">Upload File Revisi</label>
                        <input type="file" name="file_revisi" id="file_revisi{{ $proposal->id }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="catatan_revisi{{ $proposal->id }}" class="form-label">Catatan Revisi</label>
                        <textarea name="catatan_revisi" id="catatan_revisi{{ $proposal->id }}" class="form-control" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Kirim Revisi ke Admin</button>
                </div>
            </form>
        </div>
    </div>
</div>

                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada proposal masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
