@extends('layouts.main')

@section('title', 'LPJ Saya')

@section('content')
<section class="container py-4">
    <div class="card shadow-sm rounded-3">
        <div class="card-header bg-white border-0">
            <h4 class="mb-0">LPJ yang Saya Ajukan</h4>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <section class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
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
                                    @switch($lpj->status)
                                        @case('pending_admin') <span class="badge bg-warning text-dark">Menunggu Admin</span> @break
                                        @case('pending_pembina') <span class="badge bg-info text-dark">Diproses Pembina</span> @break
                                        @case('pending_kemahasiswaan') <span class="badge bg-primary">Diproses Kemahasiswaan</span> @break
                                        @case('pending_wr3') <span class="badge bg-primary">Diproses Warek III</span> @break
                                        @case('revisi_admin') <span class="badge bg-danger">Perlu Revisi</span> @break
                                        @case('revisi_pembina') <span class="badge bg-danger">Revisi Pembina</span> @break
                                        @case('revisi_kemahasiswaan') <span class="badge bg-danger">Revisi Kemahasiswaan</span> @break
                                        @case('revisi_wr3') <span class="badge bg-danger">Revisi WR III</span> @break
                                        @case('acc_final') <span class="badge bg-success">Disetujui</span> @break
                                    @endswitch
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('lpj.viewPdf', ['id' => $lpj->id]) }}" class="btn btn-info btn-sm text-nowrap">
                                        <i class="fas fa-file-pdf me-1"></i> View PDF
                                    </a>
                                </td>
                                <td>
                                    @if (!in_array($lpj->status, ['revisi_pembina', 'revisi_kaprodi', 'revisi_kemahasiswaan', 'revisi_wr3']))
                                        @if ($lpj->file_revisi)
                                            <a href="{{ asset($lpj->file_revisi) }}" class="btn btn-sm btn-warning" target="_blank" download>Download Revisi</a>
                                        @else
                                            <span class="text-muted">Belum Ada</span>
                                        @endif
                                    @else
                                        <span class="text-muted">-</span>
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
                                    @if (!in_array($lpj->status, ['revisi_pembina', 'revisi_kemahasiswaan']))
                                        <div class="d-flex gap-2">
                                            <button 
                                                type="button" 
                                                class="btn btn-danger btn-sm" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#confirmDeleteModal{{ $lpj->id }}"
                                                data-id="{{ $lpj->id }}"
                                                data-judul="{{ $lpj->judul_kegiatan }}"
                                            >
                                                Hapus
                                            </button>
                                            @if ($lpj->status == 'revisi_admin')
                                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalResubmit{{ $lpj->id }}">
                                                    Ulang
                                                </button>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="confirmDeleteModal{{ $lpj->id }}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{ $lpj->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title" id="confirmDeleteLabel{{ $lpj->id }}">Konfirmasi Hapus LPJ</h5>
                                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus LPJ <strong id="judulLPJ{{ $lpj->id }}"></strong>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('lpj.hapus', $lpj->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Ajukan Ulang -->
                            <div class="modal fade" id="modalResubmit{{ $lpj->id }}" tabindex="-1" aria-labelledby="modalResubmitLabel{{ $lpj->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('lpj.resubmit', $lpj->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalResubmitLabel{{ $lpj->id }}">Ajukan Ulang LPJ</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="filePerbaikan{{ $lpj->id }}" class="form-label">Upload File Perbaikan</label>
                                                    <input type="file" name="file_perbaikan" id="filePerbaikan{{ $lpj->id }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success">Kirim LPJ Ulang</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada LPJ yang diajukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteModal = document.querySelectorAll('.modal');
    deleteModal.forEach(modal => {
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const judul = button.getAttribute('data-judul');

            document.getElementById(`judulLPJ${id}`).textContent = judul;
        });
    });
});
</script>
@endsection
