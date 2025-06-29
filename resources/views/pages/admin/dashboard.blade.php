@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Ormawa</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalOrmawa }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Proposal Belum ACC</h4>
                            </div>
                            <div class="card-body">
                                {{ $jumlahProposalBelumAccFinal }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Laporan Masuk</h4>
                            </div>
                            <div class="card-body">
                                {{ $jumlahLPJBelumAccFinal }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Judul Kegiatan</th>
                                    <th>Pengusul</th>
                                    <th>Total Anggaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($proposalsAccFinal as $index => $proposal)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $proposal->judul_kegiatan }}</td>
                                        <td>{{ $proposal->user->name ?? '-' }}</td>
                                        <td>Rp {{ number_format($proposal->total_keseluruhan, 0, ',', '.') }}</td>
                                        <td>
                                            <form action="{{ route('proposal.hapus', $proposal->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus proposal ini? Ini akan memulihkan sisa dana user.')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Belum ada proposal disetujui.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
    </section>
@endsection
