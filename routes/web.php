<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PengumumanSekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\PembinaProposalController;
use App\Http\Controllers\PembinaLPJController;
use App\Http\Controllers\KemahasiswaanProposalController;
use App\Http\Controllers\KemahasiswaanLPJController;
use App\Http\Controllers\WarekProposalController;
use App\Http\Controllers\WarekLPJController;
use App\Http\Controllers\KaprodiProposalController;

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PengaturanDanaController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KasAnggotaController;
use App\Http\Controllers\LPJController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\PeriodeController;

use App\Http\Controllers\DashboardController;


/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 1) Route Landing Page
Route::get('/', function () {
    return view('welcome'); // atau view lain misalnya: 'landing'
});

// 2) Auth Routes (Login, Register, etc.)
Auth::routes();

// 3) Home Routes (Routes setelah login, dashboard user)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes untuk notifikasi
Route::middleware('auth')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
});

// 4) Routes setelah login, menggunakan middleware auth
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [UserController::class, 'edit'])->name('profile');
    Route::put('/update-profile', [UserController::class, 'update'])->name('update.profile');
    Route::get('/edit-password', [UserController::class, 'editPassword'])->name('ubah-password');
    Route::patch('/update-password', [UserController::class, 'updatePassword'])->name('update-password');
    
    // Proposal Routes
    Route::post('/proposal/generate', [ProposalController::class, 'generate'])->name('proposal.generate');
    Route::delete('/proposal/{id}', [ProposalController::class, 'hapusProposal'])->name('proposal.hapus');
    Route::post('/siswa/anggaran', [AnggaranController::class, 'store'])->name('anggaran.store');
    Route::get('/proposal/download/{id}', [ProposalController::class, 'download'])->name('proposal.download');
    Route::get('/proposal/{id}/view', [ProposalController::class, 'viewPdf'])->name('proposal.viewPdf');

    Route::post('/lpj/generate', [LPJController::class, 'generate'])->name('lpj.generate');
    Route::get('/lpj/{id}/view', [LPJController::class, 'viewPdf'])->name('lpj.viewPdf');
    Route::delete('/lpj/{id}', [LPJController::class, 'hapusLPJ'])->name('lpj.hapus');
    Route::get('/lpj/download/{id}', [LPJController::class, 'download'])->name('lpj.download');
});

// Routes untuk user dengan role tertentu
Route::group(['middleware' => ['auth', 'checkRole:ormawa']], function () {
    Route::get('/ormawa/dashboard', [HomeController::class, 'ormawa'])->name('ormawa.dashboard');
    Route::get('/ormawa/proposal/form', [ProposalController::class, 'index'])->name('proposal.form');
    Route::get('/ormawa/lpj/form', [LPJController::class, 'index'])->name('lpj.form');


    // Aksi generate proposal (submit form)
    Route::get('/ormawa/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::post('/ormawa/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
    Route::post('/ormawa/anggota/import', [AnggotaController::class, 'import'])->name('anggota.import');
    Route::delete('/ormawa/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

    Route::get('/ormawa/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::post('/ormawa/absensi/simpan', [AbsensiController::class, 'simpanPertemuan'])->name('absensi.simpan');
    Route::delete('/ormawa/pertemuan/{id}', [AbsensiController::class, 'hapus'])->name('pertemuan.hapus');
    Route::put('/ormawa/pertemuan/{id}', [AbsensiController::class, 'update'])->name('pertemuan.update');

    Route::get('/ormawa/keuangan', [KeuanganController::class, 'index'])->name('keuangan.index');
    Route::post('/ormawa/keuangan', [KeuanganController::class, 'store'])->name('keuangan.store');
    Route::delete('/ormawa/keuangan/{id}', [KeuanganController::class, 'destroy'])->name('keuangan.destroy');
    Route::put('/ormawa/keuangan/{id}', [KeuanganController::class, 'update'])->name('keuangan.update');
    Route::get('/ormawa/keuangan/export', [KeuanganController::class, 'export'])->name('keuangan.export');

    Route::get('/ormawa/kas-anggota', [KasAnggotaController::class, 'index'])->name('kas.anggota.index');
    Route::post('/ormawa/kas-anggota', [KasAnggotaController::class, 'store'])->name('kas.anggota.store');
    Route::put('/ormawa/kas-anggota/{id}', [KasAnggotaController::class, 'update'])->name('kas.anggota.update');
    Route::delete('/ormawa/kas-anggota/hapus-tanggal', [KasAnggotaController::class, 'destroyByDate'])->name('kas.anggota.deleteByDate');

    // List proposal yang diajukan user
    Route::get('/ormawa/proposal/list', [ProposalController::class, 'listUserProposal'])->name('ormawa.proposal');
    Route::post('/ormawa/proposal/revisi/kirim-ulang/{id}', [ProposalController::class, 'resubmit'])->name('proposal.resubmit');
    Route::get('/ormawa/lpj/list', [LPJController::class, 'listUserLPJ'])->name('ormawa.lpj');
    Route::post('/ormawa/lpj/revisi/kirim-ulang/{id}', [LPJController::class, 'resubmit'])->name('lpj.resubmit');
});

// Routes untuk Pembina
Route::prefix('pembina')->name('pembina.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'pembinaDashboard'])->name('dashboard');
    Route::get('/proposal', [\App\Http\Controllers\PembinaProposalController::class, 'index'])->name('proposal.index');
    Route::post('/proposal/acc/{id}', [\App\Http\Controllers\PembinaProposalController::class, 'acc'])->name('proposal.acc');
    Route::get('/proposal/revisi/{id}', [\App\Http\Controllers\PembinaProposalController::class, 'formRevisi'])->name('proposal.revisi.form');
    Route::post('/proposal/revisi/{id}', [\App\Http\Controllers\PembinaProposalController::class, 'revisi'])->name('proposal.revisi');
    Route::post('/upload-ttd', [PembinaProposalController::class, 'uploadTtd'])->name('uploadTtd');
    Route::get('/keuangan', [PembinaProposalController::class, 'keuangan'])->name('keuangan');

    Route::get('/lpj', [\App\Http\Controllers\PembinaLPJController::class, 'index'])->name('lpj.index');
    Route::post('/lpj/acc/{id}', [\App\Http\Controllers\PembinaLPJController::class, 'acc'])->name('lpj.acc');
    Route::get('/lpj/revisi/{id}', [\App\Http\Controllers\PembinaLPJController::class, 'formRevisi'])->name('lpj.revisi.form');
    Route::post('/lpj/revisi/{id}', [\App\Http\Controllers\PembinaLPJController::class, 'revisi'])->name('lpj.revisi');
});

// Routes untuk Kaprodi
Route::prefix('kaprodi')->name('kaprodi.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'kaprodiDashboard'])->name('dashboard');
    Route::get('/proposal', [\App\Http\Controllers\KaprodiProposalController::class, 'index'])->name('proposal.index');
    Route::post('/proposal/acc/{id}', [\App\Http\Controllers\KaprodiProposalController::class, 'acc'])->name('proposal.acc');
    Route::get('/proposal/revisi/{id}', [\App\Http\Controllers\KaprodiProposalController::class, 'formRevisi'])->name('proposal.revisi.form');
    Route::post('/proposal/revisi/{id}', [\App\Http\Controllers\KaprodiProposalController::class, 'revisi'])->name('proposal.revisi');
    Route::post('/upload-ttd', [KaprodiProposalController::class, 'uploadTtd'])->name('uploadTtd');
    Route::get('/keuangan', [KaprodiProposalController::class, 'keuangan'])->name('keuangan');

    Route::get('/lpj', [\App\Http\Controllers\KaprodiLPJController::class, 'index'])->name('lpj.index');
    Route::post('/lpj/acc/{id}', [\App\Http\Controllers\KaprodiLPJController::class, 'acc'])->name('lpj.acc');
    Route::get('/lpj/revisi/{id}', [\App\Http\Controllers\KaprodiLPJController::class, 'formRevisi'])->name('lpj.revisi.form');
    Route::post('/lpj/revisi/{id}', [\App\Http\Controllers\KaprodiLPJController::class, 'revisi'])->name('lpj.revisi');
});

// Routes untuk Kemahasiswaan
Route::prefix('kemahasiswaan')->name('kemahasiswaan.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'kemahasiswaanDashboard'])->name('dashboard');
    Route::get('/proposal', [\App\Http\Controllers\KemahasiswaanProposalController::class, 'index'])->name('proposal.index');
    Route::post('/proposal/acc/{id}', [\App\Http\Controllers\KemahasiswaanProposalController::class, 'acc'])->name('proposal.acc');
    Route::get('/proposal/revisi/{id}', [\App\Http\Controllers\KemahasiswaanProposalController::class, 'formRevisi'])->name('proposal.revisi.form');
    Route::post('/proposal/revisi/{id}', [KemahasiswaanProposalController::class, 'revisi'])->name('proposal.revisi');

    Route::get('/LPJ', [\App\Http\Controllers\KemahasiswaanLPJController::class, 'index'])->name('lpj.index');
    Route::post('/LPJ/acc/{id}', [\App\Http\Controllers\KemahasiswaanLPJController::class, 'acc'])->name('lpj.acc');
    Route::get('/LPJ/revisi/{id}', [\App\Http\Controllers\KemahasiswaanLPJController::class, 'formRevisi'])->name('lpj.revisi.form');
    Route::post('/LPJ/revisi/{id}', [KemahasiswaanLPJController::class, 'revisi'])->name('lpj.revisi');
});



// Routes untuk WR3
Route::prefix('wr3')->name('wr3.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'warekDashboard'])->name('dashboard');
    Route::get('/proposal', [\App\Http\Controllers\WarekProposalController::class, 'index'])->name('proposal.index');
    Route::post('/proposal/acc/{id}', [\App\Http\Controllers\WarekProposalController::class, 'acc'])->name('proposal.acc');
    Route::get('/proposal/revisi/{id}', [\App\Http\Controllers\WarekProposalController::class, 'formRevisi'])->name('proposal.revisi.form');
    Route::post('/proposal/revisi/{id}', [WarekProposalController::class, 'revisi'])->name('proposal.revisi');

    Route::get('/lpj', [\App\Http\Controllers\WarekLPJController::class, 'index'])->name('lpj.index');
    Route::post('/lpj/acc/{id}', [\App\Http\Controllers\WarekLPJController::class, 'acc'])->name('lpj.acc');
    Route::get('/lpj/revisi/{id}', [\App\Http\Controllers\WarekLPJController::class, 'formRevisi'])->name('lpj.revisi.form');
    Route::post('/lpj/revisi/{id}', [WarekLPJController::class, 'revisi'])->name('lpj.revisi');
});

// Routes untuk Admin
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/admin/dashboard', [HomeController::class, 'admin'])->name('admin.dashboard');
    Route::resource('jurusan', JurusanController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('user', UserController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('pengumuman-sekolah', PengumumanSekolahController::class);
    Route::resource('pengaturan', PengaturanController::class);
    Route::get('/admin/proposal', [ProposalController::class, 'listProposalAdmin'])->name('admin.proposal.list');
    Route::get('/admin/proposal/acc/{id}', [ProposalController::class, 'accByAdmin'])->name('proposal.acc.admin');
    Route::post('/admin/proposal/revisi/{id}', [ProposalController::class, 'revisiByAdmin'])->name('proposal.revisi.admin');
    Route::get('/admin/ormawa/dana', [PengaturanDanaController::class, 'index'])->name('admin.ormawa.dana');
    Route::post('/admin/ormawa/dana/update/{id}', [PengaturanDanaController::class, 'update'])->name('admin.ormawa.dana.update');
    // (optional) route tambah manual
    Route::post('/admin/ormawa/dana/store', [PengaturanDanaController::class, 'store'])->name('admin.ormawa.dana.store');

    Route::get('/admin/lpj', [LPJController::class, 'listLPJAdmin'])->name('admin.lpj.list');
    Route::get('/admin/lpj/acc/{id}', [LPJController::class, 'accByAdmin'])->name('lpj.acc.admin');
    Route::post('/admin/lpj/revisi/{id}', [LPJController::class, 'revisiByAdmin'])->name('lpj.revisi.admin');

    Route::get('/index', [PeriodeController::class, 'index'])->name('admin.periode.index');
    Route::get('/create', [PeriodeController::class, 'create'])->name('admin.periode.create');
    Route::post('/store', [PeriodeController::class, 'store'])->name('admin.periode.store');
    Route::post('/{id}/aktifkan', [PeriodeController::class, 'setAktif'])->name('admin.periode.aktifkan');
    Route::delete('/{id}', [PeriodeController::class, 'destroy'])->name('admin.periode.destroy');
});

Route::post('/set-periode', function (Illuminate\Http\Request $request) {
    session(['periode_terpilih' => $request->periode_id]);
    return back();
})->name('set.periode');
