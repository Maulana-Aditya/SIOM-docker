<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KeuanganExport;

class KeuanganController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $periodeId = periode_terpilih_id();

        // Ambil data keuangan sesuai user dan periode
        $baseQuery = Keuangan::where('user_id', $userId)
                             ->where('periode_id', $periodeId);

        $data = (clone $baseQuery)->orderByDesc('tanggal')->get();

        $saldo = (clone $baseQuery)
            ->selectRaw("SUM(CASE WHEN jenis = 'pemasukan' THEN jumlah ELSE -jumlah END) as total")
            ->value('total') ?? 0;

        $totalPemasukan = (clone $baseQuery)->where('jenis', 'pemasukan')->sum('jumlah');
        $totalPengeluaran = (clone $baseQuery)->where('jenis', 'pengeluaran')->sum('jumlah');

        return view('pages.ormawa.keuangan.index', compact('data', 'saldo', 'totalPemasukan', 'totalPengeluaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:1'
        ]);

        Keuangan::create([
            'user_id' => auth()->id(),
            'periode_id' => periode_terpilih_id(),
            ...$request->only(['jenis', 'keterangan', 'tanggal', 'jumlah']),
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        Keuangan::where('id', $id)->where('user_id', auth()->id())->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:1'
        ]);

        $data = Keuangan::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $data->update($request->only(['jenis', 'keterangan', 'tanggal', 'jumlah']));

        return redirect()->back()->with('success', 'Data berhasil diupdate.');
    }

    public function export()
    {
        return Excel::download(new KeuanganExport(auth()->id()), 'keuangan_ormawa.xlsx');
    }
}
