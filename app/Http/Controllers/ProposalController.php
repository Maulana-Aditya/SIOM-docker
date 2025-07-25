<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use App\Notifications\ProposalStatusChanged;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    // ✅ Index halaman form pengajuan proposal
    public function index()
    {
        return view('pages.ormawa.FormPropo.index'); // Pastikan sesuai nama file blade form proposal
    }

    // ✅ Generate Proposal & Simpan ke Database
    public function generate(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nomor_urut' => 'required|string',
            'bulan_romawi' => 'required|string',
            'tanggal_kegiatan' => 'required|date|after_or_equal:' . Carbon::now()->addDays(30)->toDateString(),
            'tahun' => 'required|string',
            'ormawa' => 'required|string',
            'dari' => 'required|string',
            'surat_edaran' => 'required|string',
            'nomor_surat_edaran' => 'required|string',
            'kode_anggaran' => 'required|string',
            'nama_kegiatan' => 'required|string',
            'tema_kegiatan' => 'required|string',
            'latar_belakang' => 'required|string',
            'tujuan' => 'required|string',
            'ketua_pelaksana' => 'required|string',
            'nim_ketua' => 'required|string',
            'jumlah_dana' => 'required|numeric',
            'terbilang_dana' => 'required|string',
            'tanggal_surat' => 'required|date',
            'tanggal_rapat' => 'required|date',
            'tanggal_surat_edaran' => 'required|date',
            'ttd_ketua' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            // Anggaran
            'anggaran' => 'required|array|min:1',
            'anggaran.*.uraian' => 'required|string',
            'anggaran.*.volume' => 'required|numeric',
            'anggaran.*.satuan' => 'required|string',
            'anggaran.*.harga_satuan' => 'required|numeric',
            'anggaran.*.jumlah_total' => 'required|numeric',
            // Rundown
            'rundown' => 'required|array|min:1',
            'rundown.*.jam' => 'required|string',
            'rundown.*.durasi' => 'required|string',
            'rundown.*.kegiatan' => 'required|string',
            'rundown.*.penanggung_jawab' => 'required|string',
        ], [
        'tanggal_kegiatan.after_or_equal' => 'Tanggal kegiatan minimal H-30 hari dari hari ini.',
    ]);

        // Hitung total keseluruhan anggaran
        $totalKeseluruhan = array_sum(array_column($request->anggaran, 'jumlah_total'));

        // Cek dana tersedia
$userId = auth()->id();
$danaAwal = 9000000;

$totalTerpakai = Proposal::where('dibuat_oleh_user_id', $userId)
    ->where('status', 'acc_final')
    ->sum('total_keseluruhan');

$sisaDana = $danaAwal - $totalTerpakai;

if ($totalKeseluruhan > $sisaDana) {
    return back()->with('error', 'Pengajuan proposal ditolak. Total anggaran melebihi sisa dana yang tersedia (Rp ' . number_format($sisaDana, 0, ',', '.') . ').');
}

        // Upload tanda tangan
        $ttdFile = $request->file('ttd_ketua');
        $ttdFileName = 'TTD_Ketua_' . time() . '.' . $ttdFile->getClientOriginalExtension();
        $ttdFile->storeAs('public/ttd', $ttdFileName);
        $ttdPath = storage_path('app/public/ttd/' . $ttdFileName);


        // Path template Word
        $templatePath = public_path('template/format_proposal.docx');
        if (!file_exists($templatePath)) {
            return back()->with('error', 'Template file tidak ditemukan.');
        }

        // Load template Word
        $templateProcessor = new TemplateProcessor($templatePath);


$anggaranList = $request->anggaran;
$rowCount = count($anggaranList);



        // Nomor surat lengkap
        $nomorSuratLengkap = 'ND / ' . $request->nomor_urut . ' / ' . $request->bulan_romawi . ' / ' . $request->tahun . ' / ' . $request->ormawa;
        $templateProcessor->setValue('nomor_surat_lengkap', $nomorSuratLengkap);
        for ($i = 0; $i < 3; $i++) {
            $templateProcessor->setImageValue('ttd_ketua', ['path' => $ttdPath, 'width' => 100, 'height' => 50, 'ratio' => true]);
        }


        // Isi placeholder lainnya
        $templateProcessor->setValue('nomor_urut', $request->nomor_urut);
        $templateProcessor->setValue('bulan_romawi', $request->bulan_romawi);
        $templateProcessor->setValue('tahun', $request->tahun);
        $templateProcessor->setValue('ormawa', $request->ormawa);
        $templateProcessor->setValue('dari', $request->dari);
        $templateProcessor->setValue('surat_edaran', $request->surat_edaran);
        $templateProcessor->setValue('nomor_surat_edaran', $request->nomor_surat_edaran);
        $templateProcessor->setValue('tanggal_surat_edaran', date('d F Y', strtotime($request->tanggal_surat_edaran)));
        $templateProcessor->setValue('tanggal_rapat', date('d F Y', strtotime($request->tanggal_rapat)));
        $templateProcessor->setValue('kode_anggaran', $request->kode_anggaran);
        $templateProcessor->setValue('nama_kegiatan', $request->nama_kegiatan);
        $templateProcessor->setValue('tema_kegiatan', $request->tema_kegiatan);
        $templateProcessor->setValue('latar_belakang', $request->latar_belakang);
        $templateProcessor->setValue('tujuan', $request->tujuan);
        $templateProcessor->setValue('ketua_pelaksana', $request->ketua_pelaksana);
        $templateProcessor->setValue('nim_ketua', $request->nim_ketua);
        $templateProcessor->setValue('jumlah_dana', number_format($request->jumlah_dana, 0, ',', '.'));
        $templateProcessor->setValue('terbilang_dana', $request->terbilang_dana);
        $templateProcessor->setValue('tanggal_surat', date('d F Y', strtotime($request->tanggal_surat)));
        $templateProcessor->setValue('tanggal_kegiatan', date('d F Y', strtotime($request->tanggal_kegiatan)));

        foreach ($anggaranList as $index => $item) {
            $i = $index + 1; // Placeholder numbering starts from 1
            $volumeWithSatuan = $item['volume'] . ' ' . $item['satuan'];
            $templateProcessor->setValue("no#{$i}", $i);
            $templateProcessor->setValue("uraian#{$i}", $item['uraian']);
            $templateProcessor->setValue("volume#{$i}", $volumeWithSatuan);
            $templateProcessor->setValue("harga_satuan#{$i}", 'Rp. ' . number_format($item['harga_satuan'], 0, ',', '.'));
            $templateProcessor->setValue("jumlah_total#{$i}", 'Rp. ' . number_format($item['jumlah_total'], 0, ',', '.'));
        }
// Clone dua set tabel anggaran (misalnya halaman 2 dan halaman 6)
$templateProcessor->cloneRow('uraian1', $rowCount);
$templateProcessor->cloneRow('uraian2', $rowCount);

//Rundown
$rundownList = $request->rundown;
$rundownCount = count($rundownList);
$templateProcessor->cloneRow('no', $rundownCount);

foreach ($rundownList as $index => $item) {
    $i = $index + 1;
    $templateProcessor->setValue("no#{$i}", $i);
    $templateProcessor->setValue("jam#{$i}", $item['jam']);
    $templateProcessor->setValue("durasi#{$i}", $item['durasi']);
    $templateProcessor->setValue("kegiatan#{$i}", $item['kegiatan']);
    $templateProcessor->setValue("penanggung_jawab#{$i}", $item['penanggung_jawab']);
}


// Nomor surat lengkap
$nomorSuratLengkap = 'ND / ' . $request->nomor_urut . ' / ' . $request->bulan_romawi . ' / ' . $request->tahun . ' / ' . $request->ormawa;
$templateProcessor->setValue('nomor_surat_lengkap', $nomorSuratLengkap);


// Tanda tangan (pakai loop kalau perlu banyak tempat)
for ($i = 0; $i < 3; $i++) {
    $templateProcessor->setImageValue('ttd_ketua', ['path' => $ttdPath, 'width' => 100, 'height' => 50, 'ratio' => true]);
}

// Isi placeholder lainnya
$templateProcessor->setValue('nomor_urut', $request->nomor_urut);
$templateProcessor->setValue('bulan_romawi', $request->bulan_romawi);
$templateProcessor->setValue('tahun', $request->tahun);
$templateProcessor->setValue('ormawa', $request->ormawa);
$templateProcessor->setValue('dari', $request->dari);
$templateProcessor->setValue('surat_edaran', $request->surat_edaran);
$templateProcessor->setValue('nomor_surat_edaran', $request->nomor_surat_edaran);
$templateProcessor->setValue('tanggal_surat_edaran', date('d F Y', strtotime($request->tanggal_surat_edaran)));
$templateProcessor->setValue('tanggal_rapat', date('d F Y', strtotime($request->tanggal_rapat)));
$templateProcessor->setValue('kode_anggaran', $request->kode_anggaran);
$templateProcessor->setValue('nama_kegiatan', $request->nama_kegiatan);
$templateProcessor->setValue('tema_kegiatan', $request->tema_kegiatan);
$templateProcessor->setValue('latar_belakang', $request->latar_belakang);
$templateProcessor->setValue('tujuan', $request->tujuan);
$templateProcessor->setValue('ketua_pelaksana', $request->ketua_pelaksana);
$templateProcessor->setValue('nim_ketua', $request->nim_ketua);
$templateProcessor->setValue('jumlah_dana', number_format($request->jumlah_dana, 0, ',', '.'));
$templateProcessor->setValue('terbilang_dana', $request->terbilang_dana);
$templateProcessor->setValue('tanggal_surat', date('d F Y', strtotime($request->tanggal_surat)));
$templateProcessor->setValue('tanggal_kegiatan', date('d F Y', strtotime($request->tanggal_kegiatan)));

// Isi data anggaran ke dua tempat
foreach ($anggaranList as $index => $item) {
    $i = $index + 1;
    $volumeWithSatuan = $item['volume'] . ' ' . $item['satuan'];

    // Untuk tabel pertama
    $templateProcessor->setValue("no1#{$i}", $i);
    $templateProcessor->setValue("uraian1#{$i}", $item['uraian']);
    $templateProcessor->setValue("volume1#{$i}", $volumeWithSatuan);
    $templateProcessor->setValue("harga_satuan1#{$i}", 'Rp. ' . number_format($item['harga_satuan'], 0, ',', '.'));
    $templateProcessor->setValue("jumlah_total1#{$i}", 'Rp. ' . number_format($item['jumlah_total'], 0, ',', '.'));

    // Untuk tabel kedua
    $templateProcessor->setValue("no2#{$i}", $i);
    $templateProcessor->setValue("uraian2#{$i}", $item['uraian']);
    $templateProcessor->setValue("volume2#{$i}", $volumeWithSatuan);
    $templateProcessor->setValue("harga_satuan2#{$i}", 'Rp. ' . number_format($item['harga_satuan'], 0, ',', '.'));
    $templateProcessor->setValue("jumlah_total2#{$i}", 'Rp. ' . number_format($item['jumlah_total'], 0, ',', '.'));
}

$templateProcessor->setValue("total_keseluruhan", 'Rp. ' . number_format($totalKeseluruhan, 0, ',', '.'));



        // Simpan file Word hasil generate
$fileName = 'Proposal_' . time() . '.docx';
$folderPath = storage_path('app/public/proposal');
if (!file_exists($folderPath)) {
    Storage::makeDirectory('public/proposal', 0755, true);
} else {
    chmod($folderPath, 0755); // paksa ubah permission jadi bisa diakses
}
$savePath = storage_path('app/public/proposal/' . $fileName); // simpan file Word di folder yang sama dengan hasil PDF
$templateProcessor->saveAs($savePath);

// Konversi ke PDF menggunakan LibreOffice headless
$pdfFileName = pathinfo($fileName, PATHINFO_FILENAME) . '.pdf';
$pdfSavePath = storage_path('app/public/proposal/' . $pdfFileName);

$command = "libreoffice --headless --convert-to pdf \"$savePath\" --outdir \"" . storage_path('app/public/proposal') . "\"";
exec($command, $output, $resultCode);

if (!file_exists($pdfSavePath)) {
    return back()->with('error', 'Gagal mengonversi Proposal ke PDF.');
}

// Simpan ke database
$adminId = 1;
$proposal = Proposal::create([
    'judul_kegiatan'     => $request->nama_kegiatan,
    'ormawa'             => auth()->user()->ormawa,
    'prodi'              => auth()->user()->prodi,
    'file_proposal'      => 'storage/proposal/' . $fileName,
    'file_proposal_pdf'  => 'storage/proposal/' . $pdfFileName,
    'dibuat_oleh_user_id'=> auth()->id(),
    'periode_id'         => periode_terpilih_id(),
    'status'             => 'pending_admin',
    'current_reviewer_id'=> $adminId,
    'total_dana'         => 9000000,
    'sisa_dana'          => 9000000,
    'total_keseluruhan'  => $totalKeseluruhan
]);

// Kirim notifikasi ke admin
$admin = User::find($adminId);
if ($admin) {
    $admin->notify(new ProposalStatusChanged($proposal, "Proposal baru '{$request->nama_kegiatan}' telah diajukan oleh {$request->ormawa}."));
}

// Redirect
return redirect()->route('ormawa.proposal')->with('success', 'Proposal berhasil diajukan.');

    }

    // ✅ Fungsi List Proposal untuk Admin
    public function listProposalAdmin(Request $request)
{
    $query = Proposal::where('status', '!=', 'acc_final')
                     ->where('periode_id', periode_terpilih_id());

    // Filter judul
    if ($request->filled('search')) {
        $query->where('judul_kegiatan', 'like', '%' . $request->search . '%');
    }

    // Filter status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Filter tanggal pengajuan (created_at)
    if ($request->filled('tanggal')) {
        $query->whereDate('created_at', $request->tanggal);
    }

    // Ambil data dengan pagination 10 per halaman
    $proposals = $query->latest()->paginate(10)->withQueryString();

    return view('pages.admin.mapel.index', compact('proposals'));
}


    public function accByAdmin($id)
{
    $proposal = Proposal::findOrFail($id);
    

    // Path file Word asli proposal
    $fileProposalPath = public_path('storage/proposal/' . basename($proposal->file_proposal));

    // Load file Word (tidak perlu setImageValue karena admin tidak tanda tangan)
    $templateProcessor = new TemplateProcessor($fileProposalPath);
    $templateProcessor->saveAs($fileProposalPath); // Simpan kembali tanpa perubahan

    // Konversi ke PDF menggunakan LibreOffice di dalam container Docker
    $pdfFileName = pathinfo($fileProposalPath, PATHINFO_FILENAME) . '.pdf';
    $outputDir = storage_path('app/public/proposal');
    $command = "libreoffice --headless --convert-to pdf \"$fileProposalPath\" --outdir \"$outputDir\"";
    exec($command, $output, $resultCode);

    // Cek hasil konversi
    if ($resultCode === 0 && file_exists($outputDir . '/' . $pdfFileName)) {
        // Cari pembina sesuai ormawa
        $pembina = User::where('roles', 'pembina')
                        ->where('ormawa', $proposal->ormawa)
                        ->first();

        if (!$pembina) {
            return back()->with('error', 'Pembina untuk ormawa tersebut tidak ditemukan.');
        }

        $proposal->update([
            'status' => 'pending_pembina',
            'current_reviewer_id' => $pembina->id,
            'file_proposal_pdf' => 'storage/proposal/' . $pdfFileName,
        ]);

        $pembina->notify(new ProposalStatusChanged(
            $proposal,
            "Proposal '{$proposal->judul_kegiatan}' siap ditinjau oleh Pembina."
        ));

        return back()->with('success', 'Proposal berhasil ACC dan diteruskan ke Pembina.');
    } else {
        return back()->with('error', 'Gagal mengonversi proposal ke PDF.');
    }
}



    // ✅ Fungsi Revisi Admin
    public function revisiByAdmin(Request $request, $id)
{
    $proposal = Proposal::findOrFail($id);
    

    // Validasi catatan revisi (file revisi tidak wajib)
    $request->validate([
        'catatan_revisi' => 'required|string', // Catatan revisi wajib
        'file_revisi' => 'nullable|mimes:doc,docx,pdf|max:2048', // File revisi opsional
    ]);

    // Proses Upload File Revisi (jika ada)
    if ($request->hasFile('file_revisi')) {
        // Hapus file revisi lama jika ada
        if ($proposal->file_revisi) {
            Storage::delete(str_replace('storage/', 'public/', $proposal->file_revisi));
        }

        // Simpan file revisi baru
        $file = $request->file('file_revisi');
        $fileName = 'Revisi_Proposal_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public', $fileName); // Simpan di storage/app/public
        $filePath = 'storage/' . $fileName; // Path untuk disimpan ke DB
    } else {
        // Jika tidak ada file, gunakan path lama atau kosongkan file revisi
        $filePath = $proposal->file_revisi;
    }

    // Update proposal dengan catatan revisi dan file revisi (jika ada)
    $proposal->update([
        'status' => 'revisi_admin', // Status revisi
        'file_revisi' => $filePath, // Path file revisi baru (atau tetap yang lama)
        'catatan_revisi' => $request->input('catatan_revisi'), // Catatan revisi
        'current_reviewer_id' => $proposal->dibuat_oleh_user_id, // Kembalikan ke pengusul proposal
    ]);
    $user = User::find($proposal->dibuat_oleh_user_id);

    $user->notify(new ProposalStatusChanged($proposal, "Proposal '{$proposal->judul_kegiatan}' dikembalikan untuk revisi oleh Admin."));


    return back()->with('success', 'Proposal berhasil dikembalikan ke pengusul beserta catatan revisi.');
}
    // ✅ Fungsi Download Proposal
    public function download($id)
{
    $proposal = Proposal::findOrFail($id);
    
    $filePath = public_path($proposal->file_proposal); // Akses file via public_path

    if (file_exists($filePath)) {
        return response()->download($filePath);
    } else {
        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
    
}
public function listUserProposal()
{
    // Ambil semua proposal yang dibuat oleh user yang sedang login dan statusnya bukan 'acc_final'
    $proposals = Proposal::where('dibuat_oleh_user_id', auth()->id())
                         ->where('status', '!=', 'acc_final')  // Filter status selain 'acc_final'
                         ->where('periode_id', periode_terpilih_id())
                         ->get();

    // Kirimkan data proposal ke view
    return view('pages.ormawa.status.index', compact('proposals'));
}

public function hapusProposal($id)
{
    $proposal = Proposal::findOrFail($id);
    

    // ✅ Cek apakah pemilik atau admin
    if (auth()->id() === $proposal->dibuat_oleh_user_id || auth()->user()->roles === 'admin') {

        // Hapus file proposal
        if ($proposal->file_proposal) {
            Storage::delete(str_replace('storage/', 'public/', $proposal->file_proposal));
        }


        // Hapus file revisi
        if ($proposal->file_revisi) {
            Storage::delete(str_replace('storage/', 'public/', $proposal->file_revisi));
        }

        // Hapus data
        $proposal->delete();


        return back()->with('success', 'Proposal berhasil dihapus.');
    } else {
        return back()->with('error', 'Anda tidak memiliki izin untuk menghapus proposal ini.');
    }
}

public function resubmit(Request $request, $id)
{
    $proposal = Proposal::findOrFail($id);
    

    $request->validate([
        'file_perbaikan' => 'required|mimes:doc,docx,pdf|max:5120',
    ]);

    // Upload file perbaikan
    $file = $request->file('file_perbaikan');
    $fileName = 'Perbaikan_Proposal_' . time() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public/proposal', $fileName); // simpan langsung di folder 'proposal'
    
    $savePath = storage_path('app/public/proposal/' . $fileName);

    // Konversi ke PDF menggunakan LibreOffice (Linux/Docker)
    $pdfFileName = pathinfo($fileName, PATHINFO_FILENAME) . '.pdf';
    $outputDir = storage_path('app/public/proposal');
    $pdfSavePath = $outputDir . '/' . $pdfFileName;

    // Jalankan LibreOffice headless untuk konversi DOCX ke PDF
    $command = "libreoffice --headless --convert-to pdf \"$savePath\" --outdir \"$outputDir\"";
    exec($command, $output, $resultCode);

    if ($resultCode === 0 && file_exists($pdfSavePath)) {
        $proposal->update([
            'file_proposal' => 'storage/proposal/' . $fileName,
            'file_proposal_pdf' => 'storage/proposal/' . $pdfFileName,
            'status' => 'pending_admin',
            'current_reviewer_id' => 1,
            'file_revisi' => null,
            'catatan_revisi' => null,
        ]);

        return back()->with('success', 'Proposal berhasil diajukan ulang dan dikonversi ke PDF. Menunggu persetujuan admin.');
    } else {
        return back()->with('error', 'Gagal mengonversi proposal ke PDF.');
    }
}


function tanggalIndo($tanggal) {
    $bulan = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    $date = date('Y-m-d', strtotime($tanggal));
    $explode = explode('-', $date);
    return $explode[2] . ' ' . $bulan[(int)$explode[1] - 1] . ' ' . $explode[0];
}
public function updateDana(Request $request, $id)
{
    $request->validate([
        'sisa_dana' => 'required|numeric|min:0'
    ]);

    $proposal = Proposal::findOrFail($id);

    // Kurangi total dana dengan perubahan sisa dana
    $pengurangan = $proposal->total_dana - $request->sisa_dana;

    $proposal->update([
        'sisa_dana' => $request->sisa_dana,
        'total_dana' => max(0, $proposal->total_dana - $pengurangan) // Pastikan tidak negatif
    ]);

    return redirect()->route('admin.aturDana')->with('success', 'Sisa dana berhasil diperbarui.');
}

public function aturDana()
{
    $proposals = Proposal::where('status', 'acc_final')->with('user')->get(); // hanya yang ACC
    return view('pages.admin.guru.index', compact('proposals'));
}
public function formRevisi($id)
    {
        $proposal = Proposal::findOrFail($id);
        return view('pages.admin.guru.edit', compact('proposal'));
    }
    public function viewPdf($id)
{
    $proposal = Proposal::findOrFail($id);

    // Path file PDF
    $fileRelativePath = 'storage/proposal/' . basename($proposal->file_proposal_pdf);
    $fileAbsolutePath = public_path($fileRelativePath);

    // Cek apakah file PDF ada
    if (file_exists($fileAbsolutePath)) {
        return view('proposal.view_pdf', [
            'filePath' => asset($fileRelativePath),
            'proposal' => $proposal,
        ]);
    } else {
        return redirect()->back()->with('error', 'File PDF tidak ditemukan.');
    }
}




        
    }

    

