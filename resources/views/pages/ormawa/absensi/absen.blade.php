@extends('layouts.main')

@section('content')
<section class="container py-4">
<div class="container">
<div class="card-header bg-white border-0">
            <h4 class="mb-0">Absensi Ormawa</h4>
        </div>
        <br>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahPertemuanModal">
        + Tambah Pertemuan
    </button>

    <!-- Tab Navigasi -->
    <ul class="nav nav-tabs mb-4">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#riwayatPertemuan">Riwayat Pertemuan</a>
    </li>
</ul>

    <!-- Konten Tab -->
    <div class="tab-content">
        <!-- Tab 2: Riwayat Pertemuan -->
        <div class="tab-pane fade show active" id="riwayatPertemuan">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Riwayat Pertemuan</h5>
                </div>
                <div class="card-body">
                    @foreach($pertemuan as $item)
                    <div class="pertemuan-item mb-4 border-bottom pb-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5>{{ $item->pokok_bahasan }}</h5>
                                <p class="text-muted mb-1">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    {{ $item->tanggal }}
                                </p>
                                @if($item->sub_pokok_bahasan)
                                <p class="text-muted" style="max-width: 70%; overflow-wrap: break-word; word-wrap: break-word; white-space: normal; display: inline-block;">
                                    <i class="far fa-file-alt me-2"></i>
                                    <ul style="list-style-type: none; padding-left: 20px; word-wrap: break-word;">
                                        @foreach(explode("\n", $item->sub_pokok_bahasan) as $point)
                                            <li>{{ $point }}</li>
                                        @endforeach
                                    </ul>
                                </p>
                                @endif
                            </div>
                            <div class="d-flex align-items-center">
                                <!-- Tombol Edit -->
                                <button class="btn btn-sm btn-outline-warning me-1" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editModal{{ $item->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                
                                <!-- Tombol Hapus -->
                                <form id="delete-form-{{ $item->id }}" action="{{ route('pertemuan.hapus', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $item->id }})" class="btn btn-sm btn-outline-danger me-1">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                
                                <!-- Tombol Detail -->
                                <button class="btn btn-sm btn-outline-primary" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#detailModal{{ $item->id }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Tampilkan Dokumentasi Langsung -->
                        @if($item->dokumentasi)
                        <div class="mt-3">
                            <h6>Dokumentasi:</h6>
                            <img src="{{ Storage::url($item->dokumentasi) }}" class="img-thumbnail" style="max-height: 200px;">
                        </div>
                        @endif

                        <!-- Daftar Hadir Singkat -->
                        <div class="mt-2">
                            <span class="badge bg-success">
                                <i class="fas fa-user-check"></i> Hadir: {{ $item->absensi->where('status', 'Hadir')->count() }}
                            </span>
                            <span class="badge bg-warning ms-2">
                                <i class="fas fa-user-clock"></i> Izin: {{ $item->absensi->where('status', 'Izin')->count() }}
                            </span>
                            <span class="badge bg-danger ms-2">
                                <i class="fas fa-user-times"></i> Alpa: {{ $item->absensi->where('status', 'Tidak Hadir')->count() }}
                            </span>
                        </div>
                    </div>

                    <!-- Modal Detail -->
                    <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Absensi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Tanggal:</strong> {{ $item->tanggal }}</p>
                                    <p><strong>Pokok Bahasan:</strong> {{ $item->pokok_bahasan }}</p>
                                    
                                    @if($item->dokumentasi)
                                    <p><strong>Dokumentasi:</strong></p>
                                    <img src="{{ Storage::url($item->dokumentasi) }}" class="img-fluid rounded">
                                    @endif
                                    
                                    <table class="table mt-3">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($item->absensi as $absensi)
                                            <tr>
                                                <td>{{ $absensi->anggota->nama }}</td>
                                                <td>
                                                    <span class="badge bg-{{ $absensi->status == 'Hadir' ? 'success' : ($absensi->status == 'Izin' ? 'warning' : 'danger') }}">
                                                        {{ $absensi->status }}
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Pertemuan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('pertemuan.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label>Tanggal Pertemuan</label>
                                                <input type="date" name="tanggal" class="form-control" 
                                                       value="{{ $item->tanggal }}" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Pokok Bahasan</label>
                                                <input type="text" name="pokok_bahasan" class="form-control" 
                                                       value="{{ $item->pokok_bahasan }}" required>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label>Sub Pokok Bahasan</label>
                                                <textarea name="sub_pokok_bahasan" class="form-control" rows="3">{{ $item->sub_pokok_bahasan }}</textarea>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label>Dokumentasi</label>
                                                <input type="file" name="dokumentasi" class="form-control">
                                                @if($item->dokumentasi)
                                                <div class="mt-2">
                                                    <p>Dokumentasi saat ini:</p>
                                                    <img src="{{ Storage::url($item->dokumentasi) }}" class="img-thumbnail" style="max-height: 150px;">
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <hr>
                                        
                                        <h5>Daftar Kehadiran</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($anggotas as $anggota)
                                                    @php
                                                        $absensi = $item->absensi->where('anggota_id', $anggota->id)->first();
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $anggota->nama }}</td>
                                                        <td>
                                                            <input type="hidden" name="anggota_id[]" value="{{ $anggota->id }}">
                                                            <select name="status[]" class="form-select form-select-sm">
                                                                <option value="Hadir" {{ $absensi && $absensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                                                <option value="Izin" {{ $absensi && $absensi->status == 'Izin' ? 'selected' : '' }}>Izin</option>
                                                                <option value="Tidak Hadir" {{ $absensi && $absensi->status == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @if($pertemuan->isEmpty())
                    <div class="text-center py-5">
                        <i class="far fa-folder-open fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Belum ada riwayat pertemuan</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Pertemuan -->
    <div class="modal fade" id="tambahPertemuanModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pertemuan Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('absensi.simpan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Pertemuan</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pokok Bahasan</label>
                                <input type="text" name="pokok_bahasan" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Sub Pokok Bahasan</label>
                                <textarea name="sub_pokok_bahasan" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Dokumentasi (Opsional)</label>
                                <input type="file" name="dokumentasi" class="form-control" accept="image/*">
                                <small class="text-muted">Format: JPEG, PNG, JPG, GIF (Maksimal 2MB)</small>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <h5 class="mb-3">Daftar Kehadiran Anggota</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($anggotas as $anggota)
                                    <tr>
                                        <td>{{ $anggota->nama }}</td>
                                        <td>{{ $anggota->nim ?? '-' }}</td>
                                        <td>
                                            <input type="hidden" name="anggota_id[]" value="{{ $anggota->id }}">
                                            <select name="status[]" class="form-select form-select-sm">
                                                <option value="Hadir">Hadir</option>
                                                <option value="Izin">Izin</option>
                                                <option value="Tidak Hadir">Tidak Hadir</option>
                                            </select>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Pertemuan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data pertemuan dan absensi akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-'+id).submit();
            }
        });
    }

    // Notifikasi
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}',
            timer: 3000
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}'
        });
    @endif
</script>
@endsection