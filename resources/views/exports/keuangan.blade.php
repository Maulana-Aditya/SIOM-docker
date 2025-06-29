<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
            <th>Saldo Saat Ini</th>
        </tr>
    </thead>
    <tbody>
        @php
            $saldo = 0;
            $totalPemasukan = 0;
            $totalPengeluaran = 0;
        @endphp
        @foreach($data as $item)
            @php
                $jumlah = $item->jumlah ?? $item->nominal;
                $tipe = $item->tipe ?? $item->jenis;

                if ($tipe === 'pemasukan') {
                    $totalPemasukan += $jumlah;
                    $saldo += $jumlah;
                } else {
                    $totalPengeluaran += $jumlah;
                    $saldo -= $jumlah;
                }
            @endphp
            <tr>
                <td>{{ $item->tanggal }}</td>
                <td>{{ ucfirst($tipe) }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ number_format($jumlah) }}</td>
                <td>{{ number_format($saldo) }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3" class="text-end">Total Pemasukan</th>
            <th colspan="2">{{ number_format($totalPemasukan) }}</th>
        </tr>
        <tr>
            <th colspan="3" class="text-end">Total Pengeluaran</th>
            <th colspan="2">{{ number_format($totalPengeluaran) }}</th>
        </tr>
    </tfoot>
</table>
