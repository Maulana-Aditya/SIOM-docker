<?php

namespace App\Http\Controllers;

use App\Models\LPJ;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;

class PembinaLPJController extends Controller
{
    // ✅ List proposal yang masuk ke pembina
    public function index()
    {
        $userOrmawa = auth()->user()->ormawa;

        $periodeId = periode_terpilih_id(); // Ambil periode aktif/terpilih

        $lpjs = LPJ::where('status', 'pending_pembina')
                         ->where('ormawa', $userOrmawa)
                         ->where('periode_id', $periodeId)
                         ->get();

        return view('pages.pembina.lpj', compact('lpjs'));
    }

    public function acc($id)
{
    $lpj = LPJ::findOrFail($id);
    $periodeId = periode_terpilih_id();
    $lpjs = LPJ::where('id', $id)
                ->where('periode_id', $periodeId)
                ->firstOrFail(); // pastikan LPJ milik periode terpilih

    // Path file Word asli LPJ
    $fileLPJPath = public_path('storage/' . basename($lpj->file_lpj));

    // Load file Word dengan TemplateProcessor
    $templateProcessor = new TemplateProcessor($fileLPJPath);

    // Cari pembina berdasarkan ormawa LPJ
    $pembina = User::where('roles', 'pembina')
                    ->where('ormawa', $lpj->ormawa)
                    ->first();

    if (!$pembina || !$pembina->ttd) {
        return back()->with('error', 'Tanda tangan pembina tidak tersedia.');
    }

    // Masukkan tanda tangan pembina (dari user terkait)
    $templateProcessor->setImageValue('tanda_tangan_pembina', [
        'path' => storage_path('app/public/' . $pembina->ttd),
        'width' => 150,
        'height' => 100,
        'ratio' => true
    ]);

    // Simpan file hasil (replace file lama)
    $templateProcessor->saveAs($fileLPJPath);

    // Konversi DOCX ke PDF menggunakan LibreOffice HEADLESS (tanpa path spesifik)
    $pdfFileName = pathinfo($fileLPJPath, PATHINFO_FILENAME) . '.pdf';
    $pdfSavePath = storage_path('app/public/lpj/' . $pdfFileName);

    $command = "libreoffice --headless --convert-to pdf \"$fileLPJPath\" --outdir \"" . storage_path('app/public/lpj') . "\"";
    exec($command, $output, $resultCode);

    if (!file_exists($pdfSavePath)) {
        return back()->with('error', 'Gagal mengonversi LPJ ke PDF.');
    }

    // Cari kaprodi sesuai prodi LPJ
    $kaprodi = User::where('roles', 'kaprodi')
                   ->where('prodi', $lpj->prodi)
                   ->first();

    if (!$kaprodi) {
        return back()->with('error', 'Kaprodi untuk prodi tersebut tidak ditemukan.');
    }

    // Update status dan simpan file PDF
    $lpj->update([
        'status' => 'pending_kaprodi',
        'current_reviewer_id' => $kaprodi->id,
        'file_lpj_pdf' => 'storage/lpj/' . $pdfFileName, // ✅ ini LPJ, bukan proposal
        'ttd_pembina' => $pembina->ttd,
    ]);

    return back()->with('success', 'LPJ berhasil ACC dan diteruskan ke Kaprodi dalam format PDF.');
}


    // ✅ Fungsi tampilkan form revisi
    public function revisi(Request $request, $id)
{
    $lpj = LPJ::findOrFail($id);

    $request->validate([
        'catatan_revisi' => 'required|string',
        'file_revisi' => 'nullable|mimes:doc,docx,pdf|max:2048', // ❗ opsional, bukan required
    ]);

    $data = [
        'catatan_revisi' => $request->catatan_revisi,
        'status' => 'revisi_pembina',
        'current_reviewer_id' => 1, // ID Admin
    ];

    // Jika ada file revisi diupload
    if ($request->hasFile('file_revisi')) {
        $file = $request->file('file_revisi');
        $fileName = 'Revisi_Pembina_' . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public', $fileName);
        $data['file_revisi'] = 'storage/' . $fileName;
    }

    $lpj->update($data);

    return redirect()->route('pages.pembina.index')->with('success', 'LPJ dikembalikan ke Admin untuk revisi.');
}
public function uploadTtd(Request $request)
{
    $request->validate([
        'ttd' => 'required|image|mimes:png|max:2048', // hanya PNG, max 2MB
    ]);

    $file = $request->file('ttd');
    $fileName = 'tanda_tangan_' . auth()->user()->id . '.' . $file->getClientOriginalExtension();
    $path = $file->storeAs('public/tanda_tangan', $fileName);

    // Simpan path ke kolom 'ttd' user (relatif terhadap storage/app/public)
    $user = auth()->user();
    $user->ttd = 'tanda_tangan/' . $fileName;
    $user->save();

    return back()->with('success', 'Tanda tangan berhasil diunggah.');
}
public function keuangan()
{
    $ormawa = auth()->user()->ormawa;

    $users = \App\Models\User::where('ormawa', $ormawa)->pluck('id');

    $data = \App\Models\Keuangan::whereIn('user_id', $users)->latest()->get();

    return view('pages.pembina.keuangan', compact('data'));
}


}
