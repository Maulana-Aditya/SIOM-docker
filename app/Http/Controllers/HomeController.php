<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Keuangan;
use App\Models\User;
use App\Models\Proposal;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\Orangtua;
use App\Models\PengumumanSekolah;
use App\Models\Siswa;
use App\Models\Tugas;
use App\Models\Anggota;
use App\Models\PengaturanDana;
use App\Models\LPJ;
use App\Models\Pengumuman;
use App\Models\Pengaturan;
use App\Models\Periode;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

public function admin()
{
    $periodeId = periode_terpilih_id(); // Ambil periode dari session atau helper

    // Ambil semua ormawa unik dari user role 'ormawa' yang memiliki ormawa
    $ormawaList = User::where('roles', 'ormawa')
        ->whereNotNull('ormawa')
        ->select('ormawa')
        ->distinct()
        ->get();

    // Hitung total proposal belum acc_final untuk periode aktif
    $jumlahProposalBelumAccFinal = Proposal::where('periode_id', $periodeId)
        ->where('status', '!=', 'acc_final')
        ->count();

    $jumlahLPJBelumAccFinal = LPJ::where('periode_id', $periodeId)
        ->where('status', '!=', 'acc_final')
        ->count();

    // Ambil proposal yang sudah acc_final untuk periode aktif
    $proposalsAccFinal = Proposal::with('user')
        ->where('periode_id', $periodeId)
        ->where('status', 'acc_final')
        ->orderByDesc('id')
        ->get();

    // Ambil LPJ yang sudah acc_final untuk periode aktif
    $lpjsAccFinal = LPJ::with('user')
        ->where('periode_id', $periodeId)
        ->where('status', 'acc_final')
        ->orderByDesc('id')
        ->get();

    // Hitung data dana per ormawa berdasarkan periode aktif
    $ormawas = $ormawaList->map(function ($item) use ($periodeId) {
        $ormawa = $item->ormawa;

        // Ambil satu user ormawa dari ormawa ini
        $ormawaUser = User::where('ormawa', $ormawa)->where('roles', 'ormawa')->first();

        // Ambil pengaturan dana berdasarkan user dan periode
        $pengaturan = $ormawaUser ? PengaturanDana::where('user_id', $ormawaUser->id)
            ->where('periode_id', $periodeId)
            ->first() : null;

        $totalAwal = $pengaturan ? $pengaturan->total_awal : 0;

        // Ambil semua proposal BELUM acc_final dari ormawa ini di periode ini
        $userIds = User::where('ormawa', $ormawa)->pluck('id');
        $proposals = Proposal::whereIn('dibuat_oleh_user_id', $userIds)
            ->where('periode_id', $periodeId)
            ->where('status', '!=', 'acc_final')
            ->get();

        $userIds = User::where('ormawa', $ormawa)->pluck('id');
        $lpjs = LPJ::whereIn('dibuat_oleh_user_id', $userIds)
            ->where('periode_id', $periodeId)
            ->where('status', '!=', 'acc_final')
            ->get();

        $totalDipakai = $proposals->sum('total_keseluruhan');
        $sisaDana = $totalAwal - $totalDipakai;

        return (object)[
            'nama' => $ormawa,
            'pagu_dana' => $totalAwal,
            'sisa_dana' => $sisaDana,
        ];
    });

    // Statistik umum
    $totalProposal = Proposal::where('periode_id', $periodeId)->count();
    $totalOrmawa = $ormawaList->count();
    $totalAnggota = Anggota::whereHas('user', function ($query) {
        $query->whereNotNull('ormawa');
    })->count();

    // Statistik sekolah (opsional, tidak tergantung periode)
    $siswa = Siswa::count();
    $guru = Guru::count();
    $kelas = Kelas::count();
    $mapel = Mapel::count();
    $siswaBaru = Siswa::latest('id')->first();

    return view('pages.admin.dashboard', compact(
        'siswa',
        'guru',
        'kelas',
        'mapel',
        'siswaBaru',
        'ormawas',
        'proposalsAccFinal',
        'jumlahProposalBelumAccFinal',
        'jumlahLPJBelumAccFinal',
        'totalProposal',
        'totalOrmawa',
        'totalAnggota'
    ));
}


    public function guru()
    {
        $guru = Guru::where('user_id', Auth::user()->id)->first();
        $materi = Materi::where('guru_id', $guru->id)->count();
        $jadwal = Jadwal::where('mapel_id', $guru->mapel_id)->get();
        $tugas = Tugas::where('guru_id', $guru->id)->count();
        $hari = Carbon::now()->locale('id')->isoFormat('dddd');

        return view('pages.guru.dashboard', compact('guru', 'materi', 'jadwal', 'hari', 'tugas'));
    }

    public function ormawa()
{
    $userId = auth()->id();
    $periodeId = periode_terpilih_id(); // ambil dari session atau helper

    // Ambil pengaturan dana sesuai user dan periode
    $pengaturan = PengaturanDana::where('user_id', $userId)
        ->where('periode_id', $periodeId)
        ->first();
    $totalAwal = $pengaturan ? $pengaturan->total_awal : 9000000; // fallback jika belum diset

    // Ambil semua proposal yang acc_final dan sesuai periode
    $proposals = Proposal::where('dibuat_oleh_user_id', $userId)
        ->where('periode_id', $periodeId)
        ->where('status', 'acc_final')
        ->get();

    $totalDipakai = $proposals->sum('total_keseluruhan');
    $sisaDana = $totalAwal - $totalDipakai;

    // Hitung jumlah anggota (opsional: bisa juga filter by periode jika ada kolom periode_id di tabel anggota)
    $jumlahAnggota = Anggota::where('dibuat_oleh_user_id', $userId)
    ->where('periode_id', $periodeId)
    ->count();
    // Ambil semua data keuangan untuk user & periode
    $data = Keuangan::where('user_id', $userId)
        ->where('periode_id', $periodeId)
        ->latest()
        ->get();

    // Hitung saldo total
    $saldo = Keuangan::where('user_id', $userId)
        ->where('periode_id', $periodeId)
        ->selectRaw("SUM(CASE WHEN jenis = 'pemasukan' THEN jumlah ELSE -jumlah END) as total")
        ->value('total') ?? 0;

    return view('pages.ormawa.dashboard', compact('sisaDana', 'proposals', 'jumlahAnggota', 'data', 'saldo'));
}


    public function orangtua()
    {
        $orangtua = Orangtua::with('siswas.kelas')
            ->where('user_id', Auth::user()->id)
            ->first();
        $pengumumans = PengumumanSekolah::active()->get();

        // dd($orangtua->toArray());
        return view('pages.orangtua.dashboard', compact('orangtua', 'pengumumans'));
    }
    public function pembinaDashboard()
{
    $ormawa = auth()->user()->ormawa;
    $periodeId = periode_terpilih_id(); // pakai helper

    // Ambil semua proposal acc_final dari ormawa & periode ini
    $proposals = Proposal::whereHas('user', function ($query) use ($ormawa) {
        $query->where('ormawa', $ormawa);
    })
    ->where('status', 'acc_final')
    ->where('periode_id', $periodeId)
    ->get();

    // Cari satu user ormawa dari ormawa ini
    $ormawaUser = \App\Models\User::where('ormawa', $ormawa)->where('roles', 'ormawa')->first();

    // Ambil pengaturan dana periode ini
    $pengaturan = $ormawaUser
        ? PengaturanDana::where('user_id', $ormawaUser->id)->where('periode_id', $periodeId)->first()
        : null;

    $totalAwal = $pengaturan ? $pengaturan->total_awal : 9000000;
    $totalDipakai = $proposals->sum('total_keseluruhan');
    $sisaDana = $totalAwal - $totalDipakai;

    // Hitung jumlah anggota ormawa
    $jumlahAnggota = \App\Models\Anggota::where('periode_id', $periodeId)
    ->whereHas('user', function ($query) use ($ormawa) {
        $query->where('ormawa', $ormawa);
    })->count();

    // Ambil semua user_id dalam ormawa ini
    $userIds = \App\Models\User::where('ormawa', $ormawa)->pluck('id');

    // Hitung saldo dari keuangan user ormawa untuk periode ini
    $saldo = Keuangan::whereIn('user_id', $userIds)
        ->where('periode_id', $periodeId)
        ->selectRaw("SUM(CASE WHEN jenis = 'pemasukan' THEN jumlah ELSE -jumlah END) as total")
        ->value('total') ?? 0;

    return view('pages.pembina.dashboard', compact('sisaDana', 'jumlahAnggota', 'proposals', 'saldo'));
}

public function kaprodiDashboard()
{
    $prodi = auth()->user()->prodi;
    $periodeId = periode_terpilih_id(); // Ambil periode aktif

    // Ambil semua proposal acc_final dari prodi ini dan sesuai periode
    $proposals = Proposal::whereHas('user', function ($query) use ($prodi) {
        $query->where('prodi', $prodi);
    })->where('status', 'acc_final')
      ->where('periode_id', $periodeId)
      ->get();

    $ormawaUser = \App\Models\User::where('prodi', $prodi)->where('roles', 'ormawa')->first();

    // Ambil pengaturan dana berdasarkan ormawa dan periode
    $pengaturan = $ormawaUser
        ? PengaturanDana::where('user_id', $ormawaUser->id)
                         ->where('periode_id', $periodeId)
                         ->first()
        : null;

    $totalAwal = $pengaturan ? $pengaturan->total_awal : 9000000;
    $totalDipakai = $proposals->sum('total_keseluruhan');
    $sisaDana = $totalAwal - $totalDipakai;

    // Jumlah anggota dari user yang prodi-nya sama
    $jumlahAnggota = \App\Models\Anggota::where('periode_id', $periodeId)
    ->whereHas('user', function ($query) use ($prodi) {
        $query->where('prodi', $prodi);
    })->count();

    // Ambil user_id dari prodi ini
    $userIds = \App\Models\User::where('prodi', $prodi)->pluck('id');

    // Hitung saldo keuangan user dari prodi ini berdasarkan periode
    $saldo = Keuangan::whereIn('user_id', $userIds)
        ->where('periode_id', $periodeId)
        ->selectRaw("SUM(CASE WHEN jenis = 'pemasukan' THEN jumlah ELSE -jumlah END) as total")
        ->value('total') ?? 0;

    return view('pages.kaprodi.dashboard', compact('sisaDana', 'jumlahAnggota', 'proposals', 'saldo'));
}


public function warekDashboard()
{
    $periodeId = periode_terpilih_id();

    // Ambil semua ormawa unik berdasarkan user dengan role 'ormawa'
    $ormawaList = User::where('roles', 'ormawa')
        ->whereNotNull('ormawa')
        ->select('ormawa')
        ->distinct()
        ->get();

    $ormawas = $ormawaList->map(function ($item) use ($periodeId) {
        $ormawa = $item->ormawa;

        // Ambil satu user ormawa dari ormawa ini
        $ormawaUser = User::where('ormawa', $ormawa)
                     ->where('roles', 'ormawa')
                     ->first();

        $pengaturan = $ormawaUser
            ? PengaturanDana::where('user_id', $ormawaUser->id)
                            ->where('periode_id', $periodeId)
                            ->first()
            : null;

        $totalAwal = $pengaturan ? $pengaturan->total_awal : 0;

        // Ambil semua user ID dari ormawa ini
        $userIds = User::where('ormawa', $ormawa)->pluck('id');

        // Ambil proposal acc_final dari user tersebut dan periode yang dipilih
        $proposals = Proposal::whereIn('dibuat_oleh_user_id', $userIds)
                             ->where('status', 'acc_final')
                             ->where('periode_id', $periodeId)
                             ->get();

        $totalDipakai = $proposals->sum('total_keseluruhan');
        $sisaDana = $totalAwal - $totalDipakai;

        return (object)[
            'nama' => $ormawa,
            'pagu_dana' => $totalAwal,
            'sisa_dana' => $sisaDana,
        ];
    });

    // Statistik umum berdasarkan periode
    $totalProposal = Proposal::where('periode_id', $periodeId)->count();

    $totalOrmawa = $ormawaList->count();

    $totalAnggota = Anggota::whereHas('user', function ($query) {
        $query->whereNotNull('ormawa');
    })->count(); // Tidak perlu filter periode jika anggota tidak periodik

    $proposalsBelumDisetujui = Proposal::where('status', '!=', 'acc_final')
                                       ->where('periode_id', $periodeId)
                                       ->get();

    $proposalTidakACC = $proposalsBelumDisetujui->count();

    return view('pages.wr3.dashboard', compact(
        'ormawas',
        'totalProposal',
        'totalOrmawa',
        'totalAnggota',
        'proposalsBelumDisetujui',
        'proposalTidakACC'
    ));
}

public function kemahasiswaanDashboard()
{
    $periodeId = periode_terpilih_id();

    // Ambil semua ormawa unik berdasarkan user dengan role 'ormawa'
    $ormawaList = User::where('roles', 'ormawa')
        ->whereNotNull('ormawa')
        ->select('ormawa')
        ->distinct()
        ->get();

    $ormawas = $ormawaList->map(function ($item) use ($periodeId) {
        $ormawa = $item->ormawa;

        // Ambil satu user ormawa dari ormawa ini
        $ormawaUser = User::where('ormawa', $ormawa)->where('roles', 'ormawa')->first();

        // Cek pengaturan dana dan hitung total awal
        $pengaturan = $ormawaUser ? PengaturanDana::where('user_id', $ormawaUser->id)
                                                ->where('periode_id', $periodeId)
                                                ->first() : null;

        $totalAwal = $pengaturan ? $pengaturan->total_awal : 0;

        // Ambil semua proposal dari ormawa ini yang acc_final dan sesuai periode
        $userIds = User::where('ormawa', $ormawa)->pluck('id');
        $proposals = Proposal::whereIn('dibuat_oleh_user_id', $userIds)
                             ->where('status', 'acc_final')
                             ->where('periode_id', $periodeId)
                             ->get();

        $totalDipakai = $proposals->sum('total_keseluruhan');
        $sisaDana = $totalAwal - $totalDipakai;

        return (object)[
            'nama' => $ormawa,
            'pagu_dana' => $totalAwal,
            'sisa_dana' => $sisaDana,
        ];
    });

    // Statistik umum
    $totalProposal = Proposal::where('periode_id', $periodeId)->count();
    $totalOrmawa = $ormawaList->count();

    $totalAnggota = Anggota::whereHas('user', function ($query) {
        $query->whereNotNull('ormawa');
    })->count(); // Total anggota tidak perlu filter periode karena tidak ada relasi langsung

    // Proposal belum disetujui (selain acc_final) di periode ini
    $proposalsBelumDisetujui = Proposal::where('status', '!=', 'acc_final')
                                       ->where('periode_id', $periodeId)
                                       ->get();

    $proposalTidakACC = $proposalsBelumDisetujui->count();

    return view('pages.kemahasiswaan.dashboard', compact(
        'ormawas',
        'totalProposal',
        'totalOrmawa',
        'totalAnggota',
        'proposalsBelumDisetujui',
        'proposalTidakACC'
    ));
}




}