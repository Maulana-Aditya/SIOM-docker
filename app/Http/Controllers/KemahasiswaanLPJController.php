<?php

namespace App\Http\Controllers;

use App\Models\LPJ;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class KemahasiswaanLPJController extends Controller
{
    // ✅ List LPJ yang masuk ke Kemahasiswaan (hanya dari periode aktif)
    public function index()
    {
        $periodeId = periode_terpilih_id();

        $lpjs = LPJ::where('status', 'pending_kemahasiswaan')
                    ->where('periode_id', $periodeId)
                    ->get();

        return view('pages.kemahasiswaan.lpj', compact('lpjs'));
    }

    // ✅ Fungsi ACC oleh Kemahasiswaan
    public function acc($id)
    {
        $lpj = LPJ::findOrFail($id);

        // Path file Word LPJ
        $fileLPJPath = public_path('storage/' . basename($lpj->file_lpj));

        // Load template Word
        $templateProcessor = new TemplateProcessor($fileLPJPath);

        // Masukkan tanda tangan Kemahasiswaan
        $templateProcessor->setImageValue('tanda_tangan_kemahasiswaan', [
            'path' => storage_path('app/public/tanda_tangan/kemahasiswaan.png'),
            'width' => 150,
            'height' => 100,
            'ratio' => true,
        ]);

        // Simpan kembali file Word yang telah diperbarui
        $templateProcessor->saveAs($fileLPJPath);

        // Tentukan nama dan lokasi file PDF
        $pdfFileName = pathinfo($fileLPJPath, PATHINFO_FILENAME) . '.pdf';
        $pdfOutputDir = storage_path('app/public/lpj');
        $pdfSavePath = $pdfOutputDir . '/' . $pdfFileName;

        // Jalankan perintah konversi ke PDF dengan LibreOffice
        $command = "libreoffice --headless --convert-to pdf \"$fileLPJPath\" --outdir \"$pdfOutputDir\"";
        exec($command, $output, $resultCode);

        // Pastikan file PDF berhasil dibuat
        if (!file_exists($pdfSavePath)) {
            return back()->with('error', 'Gagal mengonversi LPJ ke PDF.');
        }

        // Update status dan simpan path PDF
        $warek3Id = 12; // ❗Pastikan ID Warek 3 sesuai
        $lpj->update([
            'status' => 'pending_wr3',
            'current_reviewer_id' => $warek3Id,
            'file_lpj_pdf' => 'storage/lpj/' . $pdfFileName,
            'ttd_kemahasiswaan' => 'tanda_tangan/kemahasiswaan.png',
        ]);

        return back()->with('success', 'LPJ berhasil ACC dan diteruskan ke Warek 3 dalam format PDF.');
    }

    // ✅ Tampilkan form revisi
    public function formRevisi($id)
    {
        $lpj = LPJ::findOrFail($id);
        return view('pages.kemahasiswaan.revisi', compact('lpj'));
    }

    // ✅ Proses revisi LPJ
    public function revisi(Request $request, $id)
    {
        $lpj = LPJ::findOrFail($id);

        $request->validate([
            'catatan_revisi' => 'required|string',
            'file_revisi' => 'nullable|mimes:doc,docx,pdf|max:2048',
        ]);

        $data = [
            'catatan_revisi' => $request->catatan_revisi,
            'status' => 'revisi_kemahasiswaan',
            'current_reviewer_id' => 1, // ID Admin
        ];

        if ($request->hasFile('file_revisi')) {
            $file = $request->file('file_revisi');
            $fileName = 'Revisi_Kemahasiswaan_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $fileName);
            $data['file_revisi'] = 'storage/' . $fileName;
        }

        $lpj->update($data);

        return redirect()->route('kemahasiswaanlpj.index')->with('success', 'LPJ dikembalikan ke Admin untuk revisi.');
    }
}
