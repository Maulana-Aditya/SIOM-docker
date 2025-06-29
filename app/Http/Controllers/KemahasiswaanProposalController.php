<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use App\Notifications\ProposalStatusChanged;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class KemahasiswaanProposalController extends Controller
{
    // ✅ Daftar proposal masuk ke Kemahasiswaan (hanya periode aktif)
    public function index()
    {
        $periodeId = periode_terpilih_id();

        $proposals = Proposal::where('status', 'pending_kemahasiswaan')
                             ->where('periode_id', $periodeId)
                             ->get();

        return view('pages.kemahasiswaan.index', compact('proposals'));
    }

    // ✅ Fungsi ACC oleh Kemahasiswaan
    public function acc($id)
    {
        $proposal = Proposal::findOrFail($id);

        // Path file Word
        $fileProposalPath = public_path($proposal->file_proposal); // sudah 'storage/...'

        // Load Word file
        $templateProcessor = new TemplateProcessor($fileProposalPath);

        // Pastikan file tanda tangan kemahasiswaan ada
        $ttdPath = storage_path('app/public/tanda_tangan/kemahasiswaan.png');
        if (!file_exists($ttdPath)) {
            return back()->with('error', 'File tanda tangan Kemahasiswaan tidak ditemukan.');
        }

        // Tambahkan tanda tangan ke dokumen
        $templateProcessor->setImageValue('tanda_tangan_kemahasiswaan', [
            'path' => $ttdPath,
            'width' => 150,
            'height' => 100,
            'ratio' => true
        ]);

        // Overwrite file proposal
        $templateProcessor->saveAs($fileProposalPath);

        // Konversi DOCX ke PDF via LibreOffice (cross-platform)
        $pdfFileName = pathinfo($fileProposalPath, PATHINFO_FILENAME) . '.pdf';
        $outputDir = storage_path('app/public/proposal');
        $pdfFullPath = $outputDir . '/' . $pdfFileName;

        $command = "libreoffice --headless --convert-to pdf \"$fileProposalPath\" --outdir \"$outputDir\"";
        exec($command, $output, $resultCode);

        if ($resultCode === 0 && file_exists($pdfFullPath)) {
            // Kirim ke Warek 3
            $warek = User::find(12);
            if (!$warek) {
                return back()->with('error', 'User Warek III tidak ditemukan.');
            }

            $proposal->update([
                'status' => 'pending_wr3',
                'current_reviewer_id' => $warek->id,
                'file_proposal_pdf' => 'storage/proposal/' . $pdfFileName,
                'ttd_kemahasiswaan' => 'tanda_tangan/kemahasiswaan.png'
            ]);

            $warek->notify(new ProposalStatusChanged(
                $proposal,
                "Proposal '{$proposal->judul_kegiatan}' siap ditinjau oleh Warek III."
            ));

            return back()->with('success', 'Proposal berhasil ACC dan diteruskan ke Warek III dalam format PDF.');
        } else {
            return back()->with('error', 'Gagal mengonversi file proposal ke PDF.');
        }
    }

    // ✅ Form revisi
    public function formRevisi($id)
    {
        $proposal = Proposal::findOrFail($id);
        return view('pages.kemahasiswaan.revisi', compact('proposal'));
    }

    // ✅ Proses revisi
    public function revisi(Request $request, $id)
    {
        $proposal = Proposal::findOrFail($id);

        $request->validate([
            'catatan_revisi' => 'required|string',
            'file_revisi' => 'nullable|mimes:doc,docx,pdf|max:2048',
        ]);

        $data = [
            'catatan_revisi' => $request->catatan_revisi,
            'status' => 'revisi_kemahasiswaan',
            'current_reviewer_id' => 1, // Admin
        ];

        if ($request->hasFile('file_revisi')) {
            $file = $request->file('file_revisi');
            $fileName = 'Revisi_Kemahasiswaan_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $fileName);
            $data['file_revisi'] = 'storage/' . $fileName;
        }

        $proposal->update($data);

        $admin = User::find(1);
        $admin->notify(new ProposalStatusChanged($proposal, "Proposal '{$proposal->judul_kegiatan}' dikembalikan untuk revisi oleh Kemahasiswaan."));

        return redirect()->route('kemahasiswaan.proposal.index')->with('success', 'Proposal dikembalikan ke Admin untuk revisi.');
    }
}
