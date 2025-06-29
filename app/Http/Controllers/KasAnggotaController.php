<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\KasAnggota;
use App\Models\Keuangan;
use Illuminate\Http\Request;

class KasAnggotaController extends Controller
{
    public function index()
{
    $userId = auth()->id();
    $periodeId = periode_terpilih_id();

    // Ambil anggota hanya untuk user dan periode saat ini
    $anggota = Anggota::where('dibuat_oleh_user_id', $userId)
                      ->where('periode_id', $periodeId)
                      ->get();

    // Ambil daftar tanggal unik dari kas anggota untuk user dan periode aktif
    $tanggalList = KasAnggota::where('dibuat_oleh_user_id', $userId)
        ->where('periode_id', $periodeId)
        ->select('tanggal')
        ->distinct()
        ->orderBy('tanggal')
        ->pluck('tanggal');

    return view('pages.ormawa.kas_anggota.index', compact('anggota', 'tanggalList'));
}

public function store(Request $request)
{
    $request->validate([
        'jumlah' => 'required|numeric|min:1',
    ]);

    $userId = auth()->id();
    $periodeId = periode_terpilih_id();
    $anggotaList = Anggota::where('dibuat_oleh_user_id', $userId)
                          ->where('periode_id', $periodeId)
                          ->get();

    $tanggal = now()->toDateString();
    $totalPemasukan = 0;
    $kasPertama = null;

    foreach ($anggotaList as $anggota) {
        $status = isset($request->kas[$anggota->id]) ? 'sudah' : 'belum';

        $kas = KasAnggota::create([
            'anggota_id' => $anggota->id,
            'dibuat_oleh_user_id' => $userId,
            'periode_id' => $periodeId,
            'jumlah' => $request->jumlah,
            'tanggal' => $tanggal,
            'status' => $status,
        ]);

        if ($status === 'sudah') {
            $totalPemasukan += $request->jumlah;
            if (!$kasPertama) {
                $kasPertama = $kas;
            }
        }
    }

    if ($totalPemasukan > 0 && $kasPertama) {
        Keuangan::create([
            'user_id' => $userId,
            'periode_id' => $periodeId,
            'tanggal' => $tanggal,
            'jenis' => 'pemasukan',
            'keterangan' => 'Pemasukan kas dari anggota',
            'jumlah' => $totalPemasukan,
            'kas_anggota_id' => $kasPertama->id,
        ]);
    }

    return redirect()->route('kas.anggota.index')->with('success', 'Kas berhasil dicatat.');
}



    public function histori()
{
    $userId = auth()->id();
    $periodeId = periode_terpilih_id();

    $anggota = Anggota::where('dibuat_oleh_user_id', $userId)
                      ->where('periode_id', $periodeId)
                      ->get();

    $tanggalList = KasAnggota::where('dibuat_oleh_user_id', $userId)
        ->where('periode_id', $periodeId)
        ->select('tanggal')
        ->distinct()
        ->orderBy('tanggal')
        ->pluck('tanggal');

    return view('pages.ormawa.kas_anggota.index', compact('anggota', 'tanggalList'));
}

    public function update(Request $request, $id)
{
    $kas = KasAnggota::findOrFail($id);

    $request->validate([
        'jumlah' => 'required|numeric|min:1',
        'status' => 'required|in:sudah,belum,menyicil'
    ]);

    $userId = auth()->id();
    $periodeId = periode_terpilih_id();

    $oldStatus = $kas->status;
    $oldJumlah = $kas->jumlah;

    // Update kas
    $kas->update([
        'jumlah' => $request->jumlah,
        'status' => $request->status
    ]);

    // Cek apakah sudah ada data keuangan untuk tanggal dan periode ini
    $keuangan = Keuangan::where('user_id', $userId)
        ->where('periode_id', $periodeId)
        ->where('tanggal', $kas->tanggal)
        ->where('keterangan', 'like', '%kas%')
        ->first();

    // Kondisi perubahan status kas
    if ($oldStatus !== 'sudah' && $request->status === 'sudah') {
        if ($keuangan) {
            $keuangan->update(['jumlah' => $keuangan->jumlah + $request->jumlah]);
        } else {
            Keuangan::create([
                'user_id' => $userId,
                'periode_id' => $periodeId,
                'tanggal' => $kas->tanggal,
                'jenis' => 'pemasukan',
                'keterangan' => 'Pemasukan kas dari anggota',
                'jumlah' => $request->jumlah,
                'kas_anggota_id' => $kas->id,
            ]);
        }
    } elseif ($oldStatus === 'sudah' && $request->status !== 'sudah') {
        if ($keuangan) {
            $newJumlah = $keuangan->jumlah - $oldJumlah;
            $newJumlah > 0 ? $keuangan->update(['jumlah' => $newJumlah]) : $keuangan->delete();
        }
    } elseif ($oldStatus === 'sudah' && $request->status === 'sudah' && $oldJumlah != $request->jumlah) {
        if ($keuangan) {
            $keuangan->update([
                'jumlah' => ($keuangan->jumlah - $oldJumlah) + $request->jumlah
            ]);
        }
    } elseif ($request->status === 'menyicil') {
        if ($keuangan) {
            $keuangan->update(['jumlah' => $keuangan->jumlah + $request->jumlah]);
        } else {
            Keuangan::create([
                'user_id' => $userId,
                'periode_id' => $periodeId,
                'tanggal' => $kas->tanggal,
                'jenis' => 'pemasukan',
                'keterangan' => 'Pemasukan kas dari anggota (Menyicil)',
                'jumlah' => $request->jumlah,
                'kas_anggota_id' => $kas->id,
            ]);
        }
    }

    return redirect()->back()->with('success', 'Data kas berhasil diperbarui.');
}



    public function destroy($id)
{
    $kas = KasAnggota::findOrFail($id);
    $jumlah = $kas->jumlah;
    $tanggal = $kas->tanggal;
    $periodeId = periode_terpilih_id();

    $kas->delete();

    $keuangan = Keuangan::where('user_id', auth()->id())
        ->where('periode_id', $periodeId)
        ->where('tanggal', $tanggal)
        ->where('keterangan', 'like', '%kas%')
        ->first();

    if ($keuangan) {
        $newJumlah = $keuangan->jumlah - $jumlah;
        if ($newJumlah > 0) {
            $keuangan->update(['jumlah' => $newJumlah]);
        } else {
            $keuangan->delete();
        }
    }

    return redirect()->back()->with('success', 'Data kas berhasil dihapus.');
}


    public function destroyByDate(Request $request)
{
    $tanggal = $request->tanggal;
    $periodeId = periode_terpilih_id();

    // Ambil semua kas pada tanggal dan periode tersebut
    $kasList = KasAnggota::where('tanggal', $tanggal)
                ->where('periode_id', $periodeId)
                ->where('dibuat_oleh_user_id', auth()->id())
                ->get();

    $totalJumlah = 0;

    foreach ($kasList as $kas) {
        $totalJumlah += $kas->jumlah;
        $kas->delete();
    }

    if ($totalJumlah > 0) {
        $keuangan = Keuangan::where('user_id', auth()->id())
            ->where('periode_id', $periodeId)
            ->where('tanggal', $tanggal)
            ->where('keterangan', 'like', '%kas%')
            ->first();

        if ($keuangan) {
            $newJumlah = $keuangan->jumlah - $totalJumlah;
            $newJumlah > 0 ? $keuangan->update(['jumlah' => $newJumlah]) : $keuangan->delete();
        }
    }

    return redirect()->back()->with('success', 'Semua kas pada tanggal ' . \Carbon\Carbon::parse($tanggal)->format('d-m-Y') . ' berhasil dihapus.');
}


}
