<?php

namespace App\Http\Controllers;

use App\Models\LPJ;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class WarekLPJController extends Controller
{
    // ✅ List LPJ yang masuk ke Warek 3 (periode aktif)
    public function index()
    {
        $periodeId = periode_terpilih_id();

        $lpjs = LPJ::where('status', 'pending_wr3')
                    ->where('periode_id', $periodeId)
                    ->get();

        return view('pages.wr3.lpj', compact('lpjs'));
    }

    // ✅ Fungsi ACC oleh Warek 3
    public function acc($id)
    {
        $lpj = LPJ::findOrFail($id);

        $fileLPJPath = public_path('storage/' . basename($lpj->file_lpj));

        // Load dan modifikasi Word
        $templateProcessor = new TemplateProcessor($fileLPJPath);
        $templateProcessor->setImageValue('tanda_tangan_wr3', [
            'path' => storage_path('app/public/tanda_tangan/wr3.png'),
            'width' => 150,
            'height' => 100,
            'ratio' => true,
        ]);
        $templateProcessor->saveAs($fileLPJPath);

        // Konversi ke PDF
        $pdfFileName = pathinfo($fileLPJPath, PATHINFO_FILENAME) . '.pdf';
        $pdfOutputDir = storage_path('app/public/lpj');
        $pdfSavePath = $pdfOutputDir . '/' . $pdfFileName;

        $command = "libreoffice --headless --convert-to pdf \"$fileLPJPath\" --outdir \"$pdfOutputDir\"";
        exec($command, $output, $resultCode);

        if (!file_exists($pdfSavePath)) {
            return back()->with('error', 'Gagal mengonversi LPJ ke PDF.');
        }

        // Update LPJ
        $lpj->update([
            'status' => 'acc_final',
            'ttd_wr3' => 'tanda_tangan/wr3.png',
            'file_lpj_pdf' => 'storage/lpj/' . $pdfFileName,
            'current_reviewer_id' => $lpj->dibuat_oleh_user_id,
        ]);

        return redirect()->route('wr3.lpj.index')->with('success', 'LPJ telah disetujui dan dikembalikan ke pengaju dalam bentuk PDF.');
    }

    // ✅ Tampilkan form revisi oleh Warek 3
    public function formRevisi($id)
    {
        $lpj = LPJ::findOrFail($id);
        return view('pages.wr3.revisi', compact('lpj'));
    }

    // ✅ Proses revisi oleh Warek 3
    public function revisi(Request $request, $id)
    {
        $lpj = LPJ::findOrFail($id);

        $request->validate([
            'catatan_revisi' => 'required|string',
            'file_revisi' => 'nullable|mimes:doc,docx,pdf|max:2048',
        ]);

        $data = [
            'catatan_revisi' => $request->catatan_revisi,
            'status' => 'revisi_warek',
            'current_reviewer_id' => 1, // kembali ke admin
        ];

        if ($request->hasFile('file_revisi')) {
            $file = $request->file('file_revisi');
            $fileName = 'Revisi_Warek3_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $fileName);
            $data['file_revisi'] = 'storage/' . $fileName;
        }

        $lpj->update($data);

        return redirect()->route('wr3.lpj.index')->with('success', 'LPJ dikembalikan ke Admin untuk revisi.');
    }
}
