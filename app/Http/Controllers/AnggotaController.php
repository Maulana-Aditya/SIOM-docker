<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AnggotaImport; // nanti kita buatkan import class ini

class AnggotaController extends Controller
{
    public function index()
{
    $userId = auth()->id();
    $periodeId = periode_terpilih_id(); // <- Tambahkan ini

    $anggotas = Anggota::where('dibuat_oleh_user_id', $userId)
                        ->where('periode_id', $periodeId) // <- Filter per periode
                        ->get();

    return view('pages.ormawa.absensi.index', compact('anggotas'));
}


    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
    ]);

    Anggota::create([
        'nama' => $request->nama,
        'nim' => $request->nim,
        'prodi' => $request->prodi,
        'dibuat_oleh_user_id' => auth()->id(),
        'periode_id' => periode_terpilih_id(), // <- Tambahkan ini
    ]);

    return redirect()->back()->with('success', 'Anggota berhasil ditambahkan!');
}

    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new AnggotaImport(auth()->id(), periode_terpilih_id()), $request->file('file'));

    return redirect()->back()->with('success', 'Import anggota berhasil!');
}

    public function destroy($id)
{
    $anggota = Anggota::findOrFail($id);
    $anggota->delete();

    return redirect()->back()->with('success', 'Data anggota berhasil dihapus.');
}
}
