<?php

namespace App\Http\Controllers;

use App\Models\LPJ;
use App\Models\User;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\Request;

class LPJController extends Controller
{
    public function index()
    {
        return view('pages.ormawa.LPJ.index'); 
    }

   public function generate(Request $request)
{
    $request->validate([
        'ormawa' => 'required|string',
        'program_studi' => 'required|string',
        'ketua_pelaksana' => 'required|string',
        'nim_ketua' => 'required|string',
        'nama_pembina' => 'required|string',
        'nuptk_pembina' => 'required|string',
        'nama_kaprodi' => 'required|string',
        'nuptk_kaprodi' => 'required|string',
        'pendahuluan' => 'required|string',
        'nama_kegiatan' => 'required|string',
        'tema_kegiatan' => 'required|string',
        'tujuan_kegiatan' => 'required|string',
        'manfaat_kegiatan' => 'required|string',
        'waktu' => 'required|string',
        'tempat' => 'required|string',
        'susunan_panitia' => 'required|string',
        'penutup' => 'required|string',
        'tanggal_lpj' => 'required|date',
        'ttd_ketua' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'anggaran' => 'required|array|min:1',
        'anggaran.*.uraian' => 'required|string',
        'anggaran.*.volume' => 'required|numeric',
        'anggaran.*.satuan' => 'required|string',
        'anggaran.*.harga_satuan' => 'required|numeric',
        'anggaran.*.jumlah_total' => 'required|numeric',
        'dokumentasi.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'nota.*' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048'
    ]);

    $userId = auth()->id();
    $danaAwal = 9000000;

    $totalTerpakai = LPJ::where('dibuat_oleh_user_id', $userId)
        ->where('status', 'acc_final')
        ->sum('total_keseluruhan');

    $totalKeseluruhan = array_sum(array_column($request->anggaran, 'jumlah_total'));
    $sisaDana = $danaAwal - $totalTerpakai;

    if ($totalKeseluruhan > $sisaDana) {
        return back()->with('error', 'Total pengeluaran melebihi sisa dana yang tersedia (Rp ' . number_format($sisaDana, 0, ',', '.') . ').');
    }

    // Handle upload tanda tangan ketua
    $ttdFile = $request->file('ttd_ketua');
    $ttdFileName = 'TTD_Ketua_' . time() . '.' . $ttdFile->getClientOriginalExtension();
    $ttdFile->storeAs('public/ttd', $ttdFileName);
    $ttdPath = storage_path('app/public/ttd/' . $ttdFileName);

    // Handle upload dokumentasi
    $dokumentasiPaths = [];
    if ($request->hasFile('dokumentasi')) {
        foreach ($request->file('dokumentasi') as $file) {
            $path = $file->store('public/dokumentasi');
            $dokumentasiPaths[] = str_replace('public/', 'storage/', $path);
        }
    }

    // Handle upload nota
    $notaPaths = [];
    if ($request->hasFile('nota')) {
        foreach ($request->file('nota') as $file) {
            $path = $file->store('public/nota');
            $notaPaths[] = str_replace('public/', 'storage/', $path);
        }
    }

    // Load template LPJ
    $templatePath = public_path('template/format_lpj.docx');
    if (!file_exists($templatePath)) {
        return back()->with('error', 'Template LPJ tidak ditemukan.');
    }

    $templateProcessor = new TemplateProcessor($templatePath);
    $anggaranList = $request->anggaran;
    $templateProcessor->cloneRow('uraian', count($anggaranList));

    // Set values for the template
    $templateProcessor->setImageValue('ttd_ketua', ['path' => $ttdPath, 'width' => 100, 'height' => 50]);

    $templateProcessor->setValue('nama_kegiatan', $request->nama_kegiatan);
    $templateProcessor->setValue('ormawa', $request->ormawa);
    $templateProcessor->setValue('program_studi', $request->program_studi);
    $templateProcessor->setValue('ketua_pelaksana', $request->ketua_pelaksana);
    $templateProcessor->setValue('nim_ketua', $request->nim_ketua);
    $templateProcessor->setValue('nama_pembina', $request->nama_pembina);
    $templateProcessor->setValue('nuptk_pembina', $request->nuptk_pembina);
    $templateProcessor->setValue('nama_kaprodi', $request->nama_kaprodi);
    $templateProcessor->setValue('nuptk_kaprodi', $request->nuptk_kaprodi);
    $templateProcessor->setValue('pendahuluan', $request->pendahuluan);
    $templateProcessor->setValue('tema_kegiatan', $request->tema_kegiatan);
    $templateProcessor->setValue('tujuan_kegiatan', $request->tujuan_kegiatan);
    $templateProcessor->setValue('manfaat_kegiatan', $request->manfaat_kegiatan);
    $templateProcessor->setValue('waktu', $request->waktu);
    $templateProcessor->setValue('tempat', $request->tempat);
    $templateProcessor->setValue('susunan_panitia', $request->susunan_panitia);
    $templateProcessor->setValue('penutup', $request->penutup);
    $templateProcessor->setValue('tanggal_lpj', date('d F Y', strtotime($request->tanggal_lpj)));
    $templateProcessor->setValue('total_keseluruhan', 'Rp. ' . number_format($totalKeseluruhan, 0, ',', '.'));

    // Process anggaran items
    foreach ($anggaranList as $i => $item) {
        $i++;
        $templateProcessor->setValue("no#{$i}", $i);
        $templateProcessor->setValue("uraian#{$i}", $item['uraian']);
        $templateProcessor->setValue("volume#{$i}", $item['volume'] . ' ' . $item['satuan']);
        $templateProcessor->setValue("harga_satuan#{$i}", 'Rp. ' . number_format($item['harga_satuan'], 0, ',', '.'));
        $templateProcessor->setValue("jumlah_total#{$i}", 'Rp. ' . number_format($item['jumlah_total'], 0, ',', '.'));
    }

    // Untuk dokumentasi
if (!empty($dokumentasiPaths)) {
    $templateProcessor->cloneBlock('dokumentasi_block', count($dokumentasiPaths), true, true);

foreach ($dokumentasiPaths as $index => $path) {
    $i = $index + 1;
    $templateProcessor->setValue("no_dokumentasi#$i", $i);
    $templateProcessor->setImageValue("gambar_dokumentasi#$i", [
        'path' => storage_path('app/public/' . str_replace('storage/', '', $path)),
        'width' => 400,
        'height' => 300
    ]);
    $templateProcessor->setValue("keterangan_dokumentasi#$i", "Dokumentasi $i");
}
}

// Untuk nota
if (!empty($notaPaths)) {
    $templateProcessor->cloneBlock('nota_block', count($notaPaths), true, true);

foreach ($notaPaths as $index => $path) {
    $i = $index + 1;
    $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

    $templateProcessor->setValue("no_nota#$i", $i);
    
    if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
        $templateProcessor->setImageValue("gambar_nota#$i", [
            'path' => storage_path('app/public/' . str_replace('storage/', '', $path)),
            'width' => 400
        ]);
    } else {
        $templateProcessor->setValue("gambar_nota#$i", '[PDF] ' . basename($path));
    }

    $templateProcessor->setValue("keterangan_nota#$i", "Nota $i");
}
}

    // Simpan file Word hasil generate
$fileName = 'LPJ_' . time() . '.docx';
$savePath = storage_path('app/public/' . $fileName);
$templateProcessor->saveAs($savePath);

// Konversi ke PDF menggunakan LibreOffice headless
$pdfFileName = pathinfo($fileName, PATHINFO_FILENAME) . '.pdf';
$pdfSavePath = storage_path('app/public/lpj/' . $pdfFileName);
$command = "libreoffice --headless --convert-to pdf \"$savePath\" --outdir \"" . storage_path('app/public/lpj') . "\"";
exec($command, $output, $resultCode);

if (!file_exists($pdfSavePath)) {
    return back()->with('error', 'Gagal mengonversi LPJ ke PDF.');
}

// Simpan ke database
$adminId = 1;
LPJ::create([
    'judul_kegiatan' => $request->nama_kegiatan,
    'ormawa' => auth()->user()->ormawa,
    'prodi' => auth()->user()->prodi,
    'file_lpj' => 'storage/' . $fileName,
    'file_lpj_pdf' => 'storage/lpj/' . $pdfFileName,
    'dibuat_oleh_user_id' => auth()->id(),
    'periode_id' => periode_terpilih_id(),
    'status' => 'pending_admin',
    'current_reviewer_id' => $adminId,
    'total_dana' => $danaAwal,
    'sisa_dana' => $sisaDana,
    'total_keseluruhan' => $totalKeseluruhan,
    'dokumentasi_paths' => $dokumentasiPaths,
    'nota_paths' => $notaPaths
]);

return redirect()->route('ormawa.lpj')->with('success', 'LPJ berhasil diajukan.');

}
public function listUserLPJ()
{
    // Ambil semua proposal yang dibuat oleh user yang sedang login dan statusnya bukan 'acc_final'
    $lpjs = LPJ::where('dibuat_oleh_user_id', auth()->id())
                        ->where('status', '!=', 'acc_final')
                        ->where('periode_id', periode_terpilih_id())
                        ->get();

    // Kirimkan data proposal ke view
    return view('pages.ormawa.LPJ.list', compact('lpjs'));
}
public function viewPdf($id)
    {
        $lpj = LPJ::findOrFail($id);
      
    
        // Path file PDF
        $fileRelativePath = 'storage/lpj/' . basename($lpj->file_lpj_pdf); // pastikan file_proposal_pdf berisi path yang benar
        $fileAbsolutePath = public_path($fileRelativePath);
    
        // Cek apakah file PDF ada
        if (file_exists($fileAbsolutePath)) {
            return view('lpj.view_pdf', [
                'filePath' => asset($fileRelativePath),
                'lpj' => $lpj,
            ]);
        } else {
            return redirect()->back()->with('error', 'File PDF tidak ditemukan.');
        }
    }
    public function hapusLPJ($id)
{
    $lpj = LPJ::findOrFail($id);


    // ✅ Cek apakah pemilik atau admin
    if (auth()->id() === $lpj->dibuat_oleh_user_id || auth()->user()->roles === 'admin') {

        // Hapus file proposal
        if ($lpj->file_lpj) {
            Storage::delete(str_replace('storage/', 'public/', $lpj->file_lpj));
        }

        // Hapus file revisi
        if ($lpj->file_revisi) {
            Storage::delete(str_replace('storage/', 'public/', $lpj->file_revisi));
        }

        // Hapus data
        $lpj->delete();

        return back()->with('success', 'LPJ berhasil dihapus.');
    } else {
        return back()->with('error', 'Anda tidak memiliki izin untuk menghapus LPJ ini.');
    }
}

public function resubmit(Request $request, $id)
{
    $lpj = LPJ::findOrFail($id);
    if ($lpj->periode_id !== periode_terpilih_id()) {
    return back()->with('error', 'LPJ ini tidak termasuk dalam periode yang sedang dipilih.');
}

    $request->validate([
        'file_perbaikan' => 'required|mimes:doc,docx,pdf|max:5120',
    ]);

    // Upload file perbaikan
    $file = $request->file('file_perbaikan');
    $fileName = 'Perbaikan_LPJ_' . time() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public', $fileName);
    $filePath = 'storage/' . $fileName;

    // Path asli file Word
    $fileLPJPath = public_path($filePath);

    // Konversi ke PDF menggunakan LibreOffice headless
    $pdfFileName = pathinfo($fileLPJPath, PATHINFO_FILENAME) . '.pdf';
    $pdfSavePath = storage_path('app/public/lpj/' . $pdfFileName);
    $command = "libreoffice --headless --convert-to pdf \"$fileLPJPath\" --outdir \"" . storage_path('app/public/lpj') . "\"";
    exec($command, $output, $resultCode);

    if (!file_exists($pdfSavePath)) {
        return back()->with('error', 'Gagal mengonversi LPJ ke PDF.');
    }

    $lpj->update([
        'file_lpj' => $filePath,
        'file_lpj_pdf' => 'storage/lpj/' . $pdfFileName,
        'status' => 'pending_admin',
        'current_reviewer_id' => 1,
        'file_revisi' => null,
        'catatan_revisi' => null,
    ]);

    return back()->with('success', 'LPJ berhasil diajukan ulang dan dikonversi ke PDF. Menunggu persetujuan admin.');
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
public function download($id)
{
    $lpj = LPJ::findOrFail($id);
    
    $filePath = public_path($lpj->file_lpj); // Akses file via public_path

    if (file_exists($filePath)) {
        return response()->download($filePath);
    } else {
        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
    
}
public function listLPJAdmin()
{
    $lpjs = LPJ::where('status', '!=', 'acc_final')
               ->where('periode_id', periode_terpilih_id()) // Tambahkan filter periode
               ->get();

    return view('pages.admin.LPJ.index', compact('lpjs'));
}


    public function accByAdmin($id)
{
    $lpj = LPJ::findOrFail($id);
    

    // Path file Word asli LPJ
    $fileLPJPath = public_path('storage/' . basename($lpj->file_lpj));

    // Load file Word dan simpan ulang tanpa perubahan
    $templateProcessor = new TemplateProcessor($fileLPJPath);
    $templateProcessor->saveAs($fileLPJPath);

    // Konversi ke PDF menggunakan LibreOffice headless
    $pdfFileName = pathinfo($fileLPJPath, PATHINFO_FILENAME) . '.pdf';
    $pdfSavePath = storage_path('app/public/lpj/' . $pdfFileName);
    $command = "libreoffice --headless --convert-to pdf \"$fileLPJPath\" --outdir \"" . storage_path('app/public/lpj') . "\"";
    exec($command, $output, $resultCode);

    if (!file_exists($pdfSavePath)) {
        return back()->with('error', 'Gagal mengonversi LPJ ke PDF.');
    }

    // Cari pembina sesuai ormawa
    $pembina = User::where('roles', 'pembina')
                   ->where('ormawa', $lpj->ormawa)
                   ->first();

    if (!$pembina) {
        return back()->with('error', 'Pembina untuk ormawa tersebut tidak ditemukan.');
    }

    // Update LPJ
    $lpj->update([
        'status' => 'pending_pembina',
        'current_reviewer_id' => $pembina->id,
        'file_lpj_pdf' => 'storage/lpj/' . $pdfFileName,
    ]);

    return back()->with('success', 'LPJ berhasil ACC dan diteruskan ke Pembina.');
}


// ✅ Fungsi Revisi Admin
    public function revisiByAdmin(Request $request, $id)
{
    $lpj = LPJ::findOrFail($id);
    if ($lpj->periode_id !== periode_terpilih_id()) {
        return back()->with('error', 'LPJ ini tidak termasuk dalam periode yang sedang dipilih.');
}

    // Validasi catatan revisi (file revisi tidak wajib)
    $request->validate([
        'catatan_revisi' => 'required|string', // Catatan revisi wajib
        'file_revisi' => 'nullable|mimes:doc,docx,pdf|max:2048', // File revisi opsional
    ]);

    // Proses Upload File Revisi (jika ada)
    if ($request->hasFile('file_revisi')) {
        // Hapus file revisi lama jika ada
        if ($lpj->file_revisi) {
            Storage::delete(str_replace('storage/', 'public/', $lpj->file_revisi));
        }

        // Simpan file revisi baru
        $file = $request->file('file_revisi');
        $fileName = 'Revisi_LPJ_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public', $fileName); // Simpan di storage/app/public
        $filePath = 'storage/' . $fileName; // Path untuk disimpan ke DB
    } else {
        // Jika tidak ada file, gunakan path lama atau kosongkan file revisi
        $filePath = $lpj->file_revisi;
    }

    // Update proposal dengan catatan revisi dan file revisi (jika ada)
    $lpj->update([
        'status' => 'revisi_admin', // Status revisi
        'file_revisi' => $filePath, // Path file revisi baru (atau tetap yang lama)
        'catatan_revisi' => $request->input('catatan_revisi'), // Catatan revisi
        'current_reviewer_id' => $lpj->dibuat_oleh_user_id, // Kembalikan ke pengusul proposal
    ]);

    return back()->with('success', 'LPJ berhasil dikembalikan ke pengusul beserta catatan revisi.');
}

}
