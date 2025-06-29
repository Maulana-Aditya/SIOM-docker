<?php

namespace App\Http\Controllers;

use App\Models\PengaturanDana;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;

class PengaturanDanaController extends Controller
{
    // Tampilkan daftar semua dana ormawa
    public function index()
{
    $periodeId = periode_terpilih_id();

    $userIds = User::where('roles', 'siswa')->pluck('id');

    foreach ($userIds as $userId) {
        $cek = PengaturanDana::where('user_id', $userId)
                ->where('periode_id', $periodeId)
                ->first();

        if (!$cek) {
            PengaturanDana::create([
                'user_id' => $userId,
                'periode_id' => $periodeId,
                'total_awal' => 9000000
            ]);
        }
    }

    $pengaturanDanas = PengaturanDana::with('user')
        ->where('periode_id', $periodeId)
        ->get();

    return view('pages.admin.guru.index', compact('pengaturanDanas'));
}


    // Update dana awal ormawa
    public function update(Request $request, $id)
{
    $request->validate([
        'total_awal' => 'required|numeric|min:0'
    ]);

    $pengaturan = PengaturanDana::findOrFail($id);
    $pengaturan->update([
        'total_awal' => $request->total_awal
    ]);

    return redirect()->route('admin.ormawa.dana')->with('success', 'Total dana berhasil diperbarui.');
}


    // (Optional) Untuk membuat pengaturan dana baru jika user belum punya
    public function store(Request $request)
{
    $periodeId = periode_terpilih_id();

    $request->validate([
        'user_id' => 'required|exists:users,id',
        'total_awal' => 'required|numeric|min:0',
    ]);

    $cek = PengaturanDana::where('user_id', $request->user_id)
        ->where('periode_id', $periodeId)
        ->first();

    if ($cek) {
        return redirect()->back()->with('error', 'Pengaturan dana untuk user ini di periode aktif sudah ada.');
    }

    PengaturanDana::create([
        'user_id' => $request->user_id,
        'periode_id' => $periodeId,
        'total_awal' => $request->total_awal,
    ]);

    return redirect()->back()->with('success', 'Pengaturan dana berhasil dibuat.');
}

}
