<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use App\Notifications\ProposalStatusChanged;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class WarekProposalController extends Controller
{
    // ✅ Tampilkan proposal yang sedang menunggu ACC dari Warek III (hanya periode aktif)
    public function index()
    {
        $periodeId = periode_terpilih_id();

        $proposals = Proposal::where('status', 'pending_wr3')
                             ->where('periode_id', $periodeId)
                             ->get();

        return view('pages.wr3.index', compact('proposals'));
    }

    // ✅ Proses ACC oleh Warek III
    public function acc($id)
    {
        $proposal = Proposal::findOrFail($id);

        $fileProposalPath = public_path($proposal->file_proposal);

        if (!file_exists($fileProposalPath)) {
            return back()->with('error', 'File proposal tidak ditemukan.');
        }

        $templateProcessor = new TemplateProcessor($fileProposalPath);

        $ttdPath = storage_path('app/public/tanda_tangan/wr3.png');
        if (!file_exists($ttdPath)) {
            return back()->with('error', 'Tanda tangan Warek III tidak ditemukan.');
        }

        $templateProcessor->setImageValue('tanda_tangan_wr3', [
            'path' => $ttdPath,
            'width' => 150,
            'height' => 100,
            'ratio' => true,
        ]);

        $templateProcessor->saveAs($fileProposalPath);

        $pdfFileName = pathinfo($fileProposalPath, PATHINFO_FILENAME) . '.pdf';
        $outputDir = storage_path('app/public/proposal');
        $pdfFullPath = $outputDir . '/' . $pdfFileName;

        $command = "libreoffice --headless --convert-to pdf \"$fileProposalPath\" --outdir \"$outputDir\"";
        exec($command, $output, $resultCode);

        if ($resultCode === 0 && file_exists($pdfFullPath)) {
            $proposal->update([
                'status' => 'acc_final',
                'ttd_wr3' => 'tanda_tangan/wr3.png',
                'file_proposal_pdf' => 'storage/proposal/' . $pdfFileName,
                'current_reviewer_id' => $proposal->dibuat_oleh_user_id,
            ]);

            $userPengusul = User::find($proposal->dibuat_oleh_user_id);
            if ($userPengusul) {
                $userPengusul->notify(new ProposalStatusChanged(
                    $proposal,
                    "Proposal '{$proposal->judul_kegiatan}' telah disetujui sepenuhnya oleh Warek III."
                ));
            }

            return redirect()->route('wr3.proposal.index')->with('success', 'Proposal disetujui dan dikembalikan ke pengaju.');
        }

        return back()->with('error', 'Gagal mengonversi file proposal ke PDF.');
    }

    // ✅ Tampilkan form revisi oleh Warek III
    public function formRevisi($id)
    {
        $proposal = Proposal::findOrFail($id);
        return view('pages.wr3.revisi', compact('proposal'));
    }

    // ✅ Proses revisi oleh Warek III
    public function revisi(Request $request, $id)
    {
        $proposal = Proposal::findOrFail($id);

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

        $proposal->update($data);

        $admin = User::find(1);
        if ($admin) {
            $admin->notify(new ProposalStatusChanged(
                $proposal,
                "Proposal '{$proposal->judul_kegiatan}' dikembalikan untuk revisi oleh Warek III."
            ));
        }

        return redirect()->route('wr3.proposal.index')->with('success', 'Proposal dikembalikan ke Admin untuk revisi.');
    }
}
