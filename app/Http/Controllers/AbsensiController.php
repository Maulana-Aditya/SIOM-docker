<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Anggota;
use App\Models\Pertemuan;
use App\Models\Absensi;
use App\Models\User;

class AbsensiController extends Controller
{
    public function index()
{
    $userId = auth()->id();
    $periodeId = periode_terpilih_id();

    $anggotas = Anggota::where('dibuat_oleh_user_id', $userId)
                ->where('periode_id', $periodeId)
                ->get();

    $pertemuan = Pertemuan::with('absensi.anggota')
        ->where('dibuat_oleh_user_id', $userId)
        ->where('periode_id', $periodeId) // <- filter berdasarkan periode
        ->latest()
        ->get();

    return view('pages.ormawa.absensi.absen', compact('anggotas', 'pertemuan'));
}


public function simpanPertemuan(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'pokok_bahasan' => 'required|string',
        'anggota_id' => 'required|array',
        'status' => 'required|array',
        'dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // hanya satu file
    ]);

    // Upload dokumentasi tunggal
    $dokumentasiPath = null;
    if ($request->hasFile('dokumentasi')) {
        $dokumentasiPath = $request->file('dokumentasi')->store('dokumentasi', 'public');
    }

    // Simpan pertemuan
    $pertemuan = Pertemuan::create([
    'tanggal' => $request->tanggal,
    'pokok_bahasan' => $request->pokok_bahasan,
    'sub_pokok_bahasan' => $request->sub_pokok_bahasan,
    'dokumentasi' => $dokumentasiPath,
    'dibuat_oleh_user_id' => auth()->id(),
    'periode_id' => periode_terpilih_id(), // ← Tambahkan ini
]);

    // Simpan absensi per anggota
    foreach ($request->anggota_id as $key => $anggota_id) {
        Absensi::create([
            'pertemuan_id' => $pertemuan->id,
            'anggota_id' => $anggota_id,
            'status' => $request->status[$key],
        ]);
    }

    return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan!');
}

// PertemuanController.php
public function hapus($id)
{
    try {
        $pertemuan = Pertemuan::where('id', $id)
                        ->where('periode_id', periode_terpilih_id()) // <- Validasi periode
                        ->firstOrFail();

        $pertemuan->absensi()->delete();
        $pertemuan->delete();

        return redirect()->back()->with('success', 'Pertemuan berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus: '.$e->getMessage());
    }
}

// PertemuanController.php
public function update(Request $request, $id)
{
    DB::beginTransaction();
    try {
        $request->validate([
            'tanggal' => 'required|date',
            'pokok_bahasan' => 'required|string',
            'sub_pokok_bahasan' => 'nullable|string',
            'anggota_id' => 'required|array',
            'status' => 'required|array',
            'dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // Pastikan data yang diedit sesuai periode yang sedang aktif
        $pertemuan = Pertemuan::where('id', $id)
            ->where('periode_id', periode_terpilih_id()) // Validasi sesuai periode aktif
            ->firstOrFail();

        // Jika ada file dokumentasi baru
        if ($request->hasFile('dokumentasi')) {
            // Hapus file lama (jika ada)
            if ($pertemuan->dokumentasi && \Storage::disk('public')->exists($pertemuan->dokumentasi)) {
                \Storage::disk('public')->delete($pertemuan->dokumentasi);
            }

            // Simpan file baru
            $dokumentasiPath = $request->file('dokumentasi')->store('dokumentasi', 'public');
        } else {
            $dokumentasiPath = $pertemuan->dokumentasi; // tetap gunakan file lama
        }

        // Update data pertemuan
        $pertemuan->update([
            'tanggal' => $request->tanggal,
            'pokok_bahasan' => $request->pokok_bahasan,
            'sub_pokok_bahasan' => $request->sub_pokok_bahasan,
            'dokumentasi' => $dokumentasiPath,
        ]);

        // Update data absensi tiap anggota
        foreach ($request->anggota_id as $key => $anggota_id) {
            Absensi::updateOrCreate(
                [
                    'pertemuan_id' => $id,
                    'anggota_id' => $anggota_id
                ],
                [
                    'status' => $request->status[$key]
                ]
            );
        }

        DB::commit();
        return redirect()->back()->with('success', 'Pertemuan berhasil diperbarui');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Gagal update: ' . $e->getMessage());
    }
}

}
