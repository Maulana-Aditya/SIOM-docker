<?php

namespace App\Http\Controllers;

use App\Models\LPJ;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;

class KaprodiLPJController extends Controller
{
    // ✅ List proposal yang masuk ke pembina
    public function index()
    {
        $userKaprodi = auth()->user()->prodi;

        $periodeId = periode_terpilih_id();

        $lpjs = LPJ::where('status', 'pending_kaprodi')
                 ->where('prodi', $userKaprodi)
                 ->where('periode_id', $periodeId)
                 ->get();
        return view('pages.kaprodi.lpj', compact('lpjs'));
    }

    // ✅ Fungsi ACC oleh kaprodi
    public function acc($id)
{
    $lpj = LPJ::findOrFail($id);
    if ($lpj->periode_id != $periodeId) {
        return back()->with('error', 'LPJ bukan dari periode aktif.');
    }

    // Path file Word asli LPJ
    $fileLPJPath = public_path('storage/' . basename($lpj->file_lpj));

    // Load template LPJ
    $templateProcessor = new TemplateProcessor($fileLPJPath);

    // Cari kaprodi sesuai prodi LPJ
    $kaprodi = User::where('roles', 'kaprodi')
                   ->where('prodi', $lpj->prodi)
                   ->first();

    if (!$kaprodi || !$kaprodi->ttd) {
        return back()->with('error', 'Tanda tangan Kaprodi tidak tersedia.');
    }

    // Masukkan tanda tangan kaprodi ke file Word
    $templateProcessor->setImageValue('tanda_tangan_kaprodi', [
        'path' => storage_path('app/public/' . $kaprodi->ttd),
        'width' => 150,
        'height' => 100,
        'ratio' => true,
    ]);

    // Simpan file Word yang telah diperbarui
    $templateProcessor->saveAs($fileLPJPath);

    // Siapkan nama file PDF dan direktori simpan
    $pdfFileName = pathinfo($fileLPJPath, PATHINFO_FILENAME) . '.pdf';
    $pdfOutputDir = storage_path('app/public/lpj');
    $pdfSavePath = $pdfOutputDir . '/' . $pdfFileName;

    // Konversi ke PDF dengan LibreOffice
    $command = "libreoffice --headless --convert-to pdf \"$fileLPJPath\" --outdir \"$pdfOutputDir\"";
    exec($command, $output, $resultCode);

    // Cek apakah file PDF berhasil dibuat
    if (!file_exists($pdfSavePath)) {
        return back()->with('error', 'Gagal mengonversi LPJ ke PDF.');
    }

    // Kirim ke kemahasiswaan
    $kemahasiswaanId = 11; // ❗Sesuaikan ID kemahasiswaan
    $lpj->update([
        'status' => 'pending_kemahasiswaan',
        'current_reviewer_id' => $kemahasiswaanId,
        'file_lpj_pdf' => 'storage/lpj/' . $pdfFileName,
        'ttd_kaprodi' => $kaprodi->ttd,
    ]);

    return back()->with('success', 'LPJ berhasil ACC dan diteruskan ke Kemahasiswaan dalam format PDF.');
}

    // ✅ Fungsi tampilkan form revisi
    public function formRevisi($id)
    {
        $lpj = LPJ::findOrFail($id);
        if ($lpj->periode_id != $periodeId) {
            return back()->with('error', 'LPJ bukan dari periode aktif.');
        }
        return view('pages.kaprodi.revisi', compact('lpj'));
    }

    // ✅ Fungsi Proses Revisi
    public function revisi(Request $request, $id)
{
    $lpj = LPJ::findOrFail($id);
    if ($lpj->periode_id != $periodeId) {
        return back()->with('error', 'LPJ bukan dari periode aktif.');
    }

    $request->validate([
        'catatan_revisi' => 'required|string',
        'file_revisi' => 'nullable|mimes:doc,docx,pdf|max:2048',
    ]);

    $data = [
        'catatan_revisi' => $request->catatan_revisi,
        'status' => 'revisi_kaprodi',
        'current_reviewer_id' => 1, // ID Admin
    ];

    // Jika file revisi diupload
    if ($request->hasFile('file_revisi')) {
        $file = $request->file('file_revisi');
        $fileName = 'Revisi_Kaprodi_' . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public', $fileName);
        $data['file_revisi'] = 'storage/' . $fileName;
    }

    $lpj->update($data);

    return redirect()->route('kaprodi.lpj.index')->with('success', 'LPJ dikembalikan ke Admin untuk revisi.');
}
public function uploadTtd(Request $request)
{
    $request->validate([
        'ttd' => 'required|image|mimes:png|max:1024', // hanya PNG, max 1MB
    ]);

    $file = $request->file('ttd');
    $filename = 'ttd_kaprodi_' . auth()->id() . '.' . $file->getClientOriginalExtension();
    $path = $file->storeAs('public/tanda_tangan', $filename);

    $user = auth()->user();
    $user->ttd = 'tanda_tangan/' . $filename;
    $user->save();

    return back()->with('success', 'Tanda tangan berhasil diunggah.');
}
public function keuangan()
{
    $prodi = auth()->user()->prodi;

    $users = \App\Models\User::where('prodi', $prodi)->pluck('id');

    $data = \App\Models\Keuangan::whereIn('user_id', $users)->latest()->get();

    return view('pages.kaprodi.keuangan', compact('data'));
}



}
