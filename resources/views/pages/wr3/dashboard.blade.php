@extends('layouts.main')
@section('title', 'Dashboard Warek III')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard Warek III</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <!-- Total Box Stats -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger"><i class="fas fa-file-alt"></i></div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Total Proposal Belum ACC</h4></div>
                        <div class="card-body">{{ $proposalTidakACC }}</div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success"><i class="fas fa-file-signature"></i></div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Total Laporan Masuk</h4></div>
                        <div class="card-body">{{ $totalLaporan }}</div>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning"><i class="fas fa-building"></i></div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Total Ormawa</h4></div>
                        <div class="card-body">{{ $totalOrmawa }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Proposal Belum Disetujui -->
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Proposal Belum Disetujui</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Judul Kegiatan</th>
                            <th>Pengusul</th>
                            <th>Total Anggaran</th>
                            {{-- <th>Status</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proposalsBelumDisetujui as $index => $proposal)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $proposal->judul_kegiatan }}</td>
                                <td>{{ $proposal->user->name ?? '-' }}</td>
                                <td>Rp {{ number_format($proposal->total_keseluruhan, 0, ',', '.') }}</td>
                                {{-- <td>{{ $proposal->status }}</td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Tidak ada proposal yang menunggu persetujuan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Laporan Belum Disetujui -->
        {{-- <div class="card mt-4">
            <div class="card-header bg-warning text-white">
                <h5 class="mb-0">Laporan Belum Disetujui</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-warning">
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Pengirim</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporanBelumDisetujui as $index => $laporan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $laporan->kegiatan->judul_kegiatan ?? '-' }}</td>
                                <td>{{ $laporan->user->name ?? '-' }}</td>
                                <td>{{ $laporan->status }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Tidak ada laporan yang menunggu persetujuan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div> --}}
    </div>
</section>
@endsection
