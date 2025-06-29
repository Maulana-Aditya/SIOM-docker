@extends('layouts.main')

@section('title', 'Buat LPJ Kegiatan')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Buat LPJ Kegiatan</h1>
    </div>

    <div class="section-body">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('lpj.generate') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- DATA LPJ Kegiatan -->
            <h5>Data LPJ Kegiatan</h5><hr>
            <div class="row">
                <div class="col-md-6">
                    @foreach([
                        'nama_kegiatan' => 'Nama Kegiatan',
                        'ormawa' => 'Ormawa',
                        'susunan_panitia' => 'Susunan Kepanitiaan',
                        'tema_kegiatan' => 'Tema Kegiatan',
                        'pendahuluan' => 'Pendahuluan',
                        'tujuan_kegiatan' => 'Tujuan Kegiatan',
                        'manfaat_kegiatan' => 'Manfaat Kegiatan',
                        'tanggal_lpj' => 'Tanggal LPJ',
                        'program_studi' => 'Program Studi',
                    ] as $name => $label)
                        <div class="form-group mb-2">
                            <label>{{ $label }}</label>
                            @if(in_array($name, ['tujuan_kegiatan', 'pendahuluan', 'susunan_panitia','manfaat_kegiatan']))
                                <textarea name="{{ $name }}" class="form-control" rows="3" required></textarea>
                            @elseif($name == 'tanggal_pelaksanaan' || $name == 'tanggal_lpj')
                                <input type="date" name="{{ $name }}" class="form-control" required>
                            @else
                                <input type="text" name="{{ $name }}" class="form-control" required>
                            @endif
                        </div>
                    @endforeach
                    <div class="form-group mb-3">
                        <label>Upload Tanda Tangan Ketua Pelaksana</label>
                        <input type="file" name="ttd_ketua" class="form-control" accept="image/*" required>
                        <small class="text-muted">Format: JPEG/PNG (Maks 2MB)</small>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    @foreach ([
                        'ketua_pelaksana' => 'Ketua Pelaksana',
                        'nim_ketua' => 'NIM Ketua',
                        'nama_pembina' => 'Nama Pembina',
                        'nuptk_pembina' => 'NUPTK Pembina',
                        'nama_kaprodi' => 'Nama Kaprodi',
                        'nuptk_kaprodi' => 'NUPTK Kaprodi',
                        'waktu' => 'Waktu Pelaksanaan',
                        'tempat' => 'Tempat Kegiatan',
                        'penutup' => 'Penutup'
                    ] as $name => $label)
                        <div class="form-group mb-2">
                            <label>{{ $label }}</label>
                            @if($name == 'penutup')
                                <textarea name="{{ $name }}" class="form-control" rows="3" required></textarea>
                            @else
                                <input type="text" name="{{ $name }}" class="form-control" required>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- RINCIAN ANGGARAN -->
            <h5 class="mt-4">Realisasi Anggaran Dana</h5><hr>
            <table class="table table-bordered" id="tabelAnggaran">
                <thead>
                    <tr class="table-primary text-center">
                        <th>Rincian Kebutuhan</th>
                        <th>Volume</th>
                        <th>Satuan</th>
                        <th>Harga Satuan (Rp)</th>
                        <th>Jumlah Total (Rp)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="anggaran[0][uraian]" class="form-control" required></td>
                        <td><input type="number" name="anggaran[0][volume]" class="form-control volume" required></td>
                        <td><input type="text" name="anggaran[0][satuan]" class="form-control" placeholder="pcs / buah / lusin" required></td>
                        <td><input type="number" name="anggaran[0][harga_satuan]" class="form-control harga_satuan" required></td>
                        <td><input type="number" name="anggaran[0][jumlah_total]" class="form-control jumlah_total" readonly></td>
                        <td><button type="button" class="btn btn-danger btn-sm hapusBaris">Hapus</button></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="table-secondary">
                        <td colspan="4" class="text-end"><strong>Total Keseluruhan:</strong></td>
                        <td><input type="number" id="totalKeseluruhan" class="form-control" readonly></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <button type="button" class="btn btn-secondary mb-3" id="tambahBaris">+ Tambah Baris</button><br>

            <!-- DOKUMENTASI KEGIATAN -->
            <h5 class="mt-4">Dokumentasi Kegiatan</h5><hr>
            <div class="form-group">
                <label>Upload Dokumentasi Kegiatan (Maksimal 10 file)</label>
                <input type="file" name="dokumentasi[]" id="dokumentasi" 
                       class="form-control" multiple accept="image/*" max="10">
                <small class="text-muted">Format: JPEG/PNG (Maks 2MB per file)</small>
            </div>

            <!-- NOTA PEMBELIAN -->
            <h5 class="mt-4">Nota Pembelian</h5><hr>
            <div class="form-group">
                <label>Upload Nota Pembelian (Maksimal 10 file)</label>
                <input type="file" name="nota[]" id="nota" 
                       class="form-control" multiple accept="image/*,.pdf" max="10">
                <small class="text-muted">Format: JPEG/PNG/PDF (Maks 2MB per file)</small>
            </div>

            <!-- PREVIEW FILE YANG AKAN DIUPLOAD -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6>Preview Dokumentasi</h6>
                        </div>
                        <div class="card-body" id="previewDokumentasi">
                            <p class="text-muted">Belum ada file dipilih</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6>Preview Nota</h6>
                        </div>
                        <div class="card-body" id="previewNota">
                            <p class="text-muted">Belum ada file dipilih</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SUBMIT -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg">Generate LPJ</button>
            </div>
        </form>
    </div>
</section>

{{-- Script Tambah Baris Dinamis dan Hitung Total --}}
<script>
    let index = 1;

    document.getElementById('tambahBaris').addEventListener('click', function () {
        const table = document.querySelector('#tabelAnggaran tbody');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td><input type="text" name="anggaran[${index}][uraian]" class="form-control" required></td>
            <td><input type="number" name="anggaran[${index}][volume]" class="form-control volume" required></td>
            <td><input type="text" name="anggaran[${index}][satuan]" class="form-control" placeholder="pcs / buah / lusin" required></td>
            <td><input type="number" name="anggaran[${index}][harga_satuan]" class="form-control harga_satuan" required></td>
            <td><input type="number" name="anggaran[${index}][jumlah_total]" class="form-control jumlah_total" readonly></td>
            <td><button type="button" class="btn btn-danger btn-sm hapusBaris">Hapus</button></td>
        `;
        table.appendChild(row);
        index++;
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('hapusBaris')) {
            e.target.closest('tr').remove();
            hitungTotalKeseluruhan();
        }
    });

    document.addEventListener('input', function (e) {
        if (e.target.classList.contains('volume') || e.target.classList.contains('harga_satuan')) {
            const row = e.target.closest('tr');
            const volume = parseFloat(row.querySelector('.volume').value) || 0;
            const hargaSatuan = parseFloat(row.querySelector('.harga_satuan').value) || 0;
            row.querySelector('.jumlah_total').value = volume * hargaSatuan;
            hitungTotalKeseluruhan();
        }
    });

    function hitungTotalKeseluruhan() {
        let totalKeseluruhan = 0;
        document.querySelectorAll('.jumlah_total').forEach(input => {
            totalKeseluruhan += parseFloat(input.value) || 0;
        });
        document.getElementById('totalKeseluruhan').value = totalKeseluruhan;
    }

    // Preview untuk dokumentasi
    document.getElementById('dokumentasi').addEventListener('change', function(e) {
        const previewContainer = document.getElementById('previewDokumentasi');
        previewContainer.innerHTML = '';
        
        if (this.files.length > 0) {
            Array.from(this.files).forEach(file => {
                if (file.type.match('image.*')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-thumbnail m-1';
                        img.style.maxHeight = '100px';
                        previewContainer.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                }
            });
        } else {
            previewContainer.innerHTML = '<p class="text-muted">Belum ada file dipilih</p>';
        }
    });

    // Preview untuk nota
    document.getElementById('nota').addEventListener('change', function(e) {
        const previewContainer = document.getElementById('previewNota');
        previewContainer.innerHTML = '';
        
        if (this.files.length > 0) {
            Array.from(this.files).forEach(file => {
                const div = document.createElement('div');
                div.className = 'mb-2';
                
                if (file.type.match('image.*')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-thumbnail m-1';
                        img.style.maxHeight = '100px';
                        div.appendChild(img);
                        div.innerHTML += `<div>${file.name}</div>`;
                        previewContainer.appendChild(div);
                    }
                    reader.readAsDataURL(file);
                } else if (file.type === 'application/pdf') {
                    div.innerHTML = `
                        <div class="d-flex align-items-center">
                            <i class="fas fa-file-pdf fa-2x text-danger me-2"></i>
                            <div>${file.name}</div>
                        </div>
                    `;
                    previewContainer.appendChild(div);
                }
            });
        } else {
            previewContainer.innerHTML = '<p class="text-muted">Belum ada file dipilih</p>';
        }
    });
</script>
@endsection