@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Keuangan Ormawa</h1>
    </div>

    <div class="section-body">
        <div class="container">
            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Keterangan</th>
                            <th>Jumlah (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                        <tr>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ ucfirst($item->jenis) }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

