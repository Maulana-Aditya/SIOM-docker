@extends('layouts.main')

@section('title', 'Histori Kas Anggota')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Histori Kas Anggota</h1>
    </div>

    <div class="section-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tombol untuk membuka modal input kas -->
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#inputKasModal">
            + Input Kas Hari Ini
        </button>

        <!-- Tabel histori kas -->
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Nama</th>
                        @foreach ($tanggalList as $tanggal)
                            <th>
                                {{ \Carbon\Carbon::parse($tanggal)->format('d-m-Y') }}
                                <br>
                                <!-- Tombol hapus semua kas pada tanggal ini -->
                                <button class="btn btn-sm btn-danger mt-1" data-bs-toggle="modal" data-bs-target="#hapusKasTanggalModal{{ $loop->index }}">Hapus Semua</button>

                                <!-- Modal Konfirmasi Hapus Semua -->
                                <div class="modal fade" id="hapusKasTanggalModal{{ $loop->index }}" tabindex="-1" aria-labelledby="hapusKasTanggalModalLabel{{ $loop->index }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('kas.anggota.deleteByDate') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="tanggal" value="{{ $tanggal }}">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapusKasTanggalModalLabel{{ $loop->index }}">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menghapus semua data kas pada tanggal <strong>{{ \Carbon\Carbon::parse($tanggal)->format('d-m-Y') }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">Ya, Hapus Semua</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggota as $a)
                        <tr>
                            <td>{{ $a->nama }}</td>
                            @foreach ($tanggalList as $tanggal)
                                @php
                                    $kas = $a->kas->where('tanggal', $tanggal)->first();
                                @endphp
                                <td>
                                    @if ($kas)
                                        @if ($kas->status === 'sudah')
                                            <span class="text-success fw-bold">✔️</span>
                                        @elseif ($kas->status === 'belum')
                                            <span class="text-danger fw-bold">❌</span>
                                        @else
                                            <span class="text-warning fw-bold">➖</span>
                                        @endif
                                        <br>
                                        <a href="#" class="text-warning small" data-bs-toggle="modal" data-bs-target="#editKasModal{{ $kas->id }}">Edit</a>
                                        
                                        
                                    @else
                                        <span class="text-danger fw-bold">❌</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Modal Input Kas -->
<div class="modal fade" id="inputKasModal" tabindex="-1" aria-labelledby="inputKasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('kas.anggota.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inputKasModalLabel">Input Kas Anggota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <!-- Tabel anggota dengan checkbox -->
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Kas Masuk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anggota as $index => $a)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $a->nim }}</td>
                                        <td>{{ $a->nama }}</td>
                                        <td>
                                            <input type="checkbox" name="kas[{{ $a->id }}]" value="1">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Input jumlah kas -->
                    <div class="form-group text-end mt-3">
                        <label for="jumlah">Jumlah Kas (Rp):</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control w-25 d-inline-block" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan Kas</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Kas -->
@foreach($anggota as $a)
    @foreach($a->kas as $kas)
        <div class="modal fade" id="editKasModal{{ $kas->id }}" tabindex="-1" aria-labelledby="editKasModalLabel{{ $kas->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('kas.anggota.update', $kas->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editKasModalLabel{{ $kas->id }}">Edit Kas - {{ $kas->anggota->nama }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-2">
                                <label for="jumlah_{{ $kas->id }}">Jumlah (Rp):</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah_{{ $kas->id }}" value="{{ $kas->jumlah }}" required>
                            </div>
                            <div class="form-group">
                                <label for="status_{{ $kas->id }}">Status Pembayaran:</label>
                                <select name="status" id="status_{{ $kas->id }}" class="form-select">
                                    <option value="sudah" {{ $kas->status == 'sudah' ? 'selected' : '' }}>✔️ Sudah</option>
                                    <option value="belum" {{ $kas->status == 'belum' ? 'selected' : '' }}>❌ Belum</option>
                                    <option value="menyicil" {{ $kas->status == 'menyicil' ? 'selected' : '' }}>➖ Menyicil</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endforeach
@endsection
