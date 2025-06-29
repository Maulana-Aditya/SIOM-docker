@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <!-- Kotak Sisa Dana -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Sisa Dana Pagu</h4>
                        </div>
                        <div class="card-body">
                            Rp {{ number_format($sisaDana, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kotak saldo internal -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Saldo Internal</h4>
                        </div>
                        <div class="card-body">
                        Rp {{ number_format($saldo, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kotak Proposal Disetujui -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Proposal Disetujui</h4>
                        </div>
                        <div class="card-body">
                            {{ $proposals->count() }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kotak Jumlah Anggota -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Anggota</h4>
                        </div>
                        <div class="card-body">
                            {{ $jumlahAnggota }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Proposal Disetujui -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Proposal Disetujui (ACC Final)</h5>
                    </div>
                    <div class="card-body p-0">
                        @if($proposals->isEmpty())
                            <div class="p-4 text-center text-muted">Belum ada proposal yang disetujui.</div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead class="table-primary">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Kegiatan</th>
                                        <th>Total Anggaran (Rp)</th>
                                        <th>Status</th>
                                        <th>File Final</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $index => $proposal)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $proposal->judul_kegiatan }}</td>
                                            <td>Rp {{ number_format($proposal->total_keseluruhan, 0, ',', '.') }}</td>
                                            <td>
                                                <span class="badge bg-success">Disetujui</span>
                                            </td>
                                            <td>
                                                @if ($proposal->status == 'acc_final')
                                                    <a href="{{ route('proposal.download', $proposal->id) }}" class="btn btn-primary btn-sm" download>Download</a>
                                                @else
                                                    <span class="text-muted">Tidak tersedia</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<!-- AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
@endpush

@push('scripts')
<!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endpush
