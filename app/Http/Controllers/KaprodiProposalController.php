<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use App\Notifications\ProposalStatusChanged;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;

class KaprodiProposalController extends Controller
{
    // ✅ List proposal yang masuk ke pembina
    public function index()
{
    $userKaprodi = auth()->user()->prodi;
    $periodeId = periode_terpilih_id();

    $proposals = Proposal::where('status', 'pending_kaprodi')
                         ->where('prodi', $userKaprodi)
                         ->where('periode_id', $periodeId)
                         ->get();

    return view('pages.kaprodi.index', compact('proposals'));
}


    // ✅ Fungsi ACC oleh kaprodi
    public function acc($id)
{
    $proposal = Proposal::findOrFail($id);
    $periodeId = periode_terpilih_id();
    if ($proposal->periode_id != $periodeId) {
        return back()->with('error', 'Proposal bukan dari periode aktif.');
}

    // Path file Word asli proposal
    $fileProposalPath = public_path($proposal->file_proposal); // Sudah 'storage/...'

    // Load file Word
    $templateProcessor = new TemplateProcessor($fileProposalPath);

    // Cari kaprodi
    $kaprodi = User::where('roles', 'kaprodi')
                    ->where('prodi', $proposal->prodi)
                    ->first();

    if (!$kaprodi || !$kaprodi->ttd) {
        return back()->with('error', 'Tanda tangan Kaprodi tidak tersedia.');
    }

    // Masukkan tanda tangan kaprodi
    $templateProcessor->setImageValue('tanda_tangan_kaprodi', [
        'path' => storage_path('app/public/' . $kaprodi->ttd),
        'width' => 150,
        'height' => 100,
        'ratio' => true,
    ]);

    // Overwrite file proposal asli
    $templateProcessor->saveAs($fileProposalPath);

    // Konversi DOCX ke PDF menggunakan LibreOffice (cross-platform)
    $pdfFileName = pathinfo($fileProposalPath, PATHINFO_FILENAME) . '.pdf';
    $outputDir = storage_path('app/public/proposal');
    $pdfSavePath = $outputDir . '/' . $pdfFileName;

    $command = "libreoffice --headless --convert-to pdf \"$fileProposalPath\" --outdir \"$outputDir\"";
    exec($command, $output, $resultCode);

    if ($resultCode === 0 && file_exists($pdfSavePath)) {
        $kemahasiswaan = User::find(11);
        if (!$kemahasiswaan) {
            return back()->with('error', 'User Kemahasiswaan tidak ditemukan.');
        }

        $proposal->update([
            'status' => 'pending_kemahasiswaan',
            'current_reviewer_id' => $kemahasiswaan->id,
            'file_proposal_pdf' => 'storage/proposal/' . $pdfFileName,
            'ttd_kaprodi' => $kaprodi->ttd,
        ]);

        $kemahasiswaan->notify(new ProposalStatusChanged($proposal, "Proposal '{$proposal->judul_kegiatan}' siap ditinjau oleh Kemahasiswaan."));

        return back()->with('success', 'Proposal berhasil ACC dan diteruskan ke Kemahasiswaan dalam format PDF.');
    } else {
        return back()->with('error', 'Gagal mengonversi proposal ke PDF.');
    }
}

    // ✅ Fungsi tampilkan form revisi
    public function formRevisi($id)
    {
        $proposal = Proposal::findOrFail($id);
        $periodeId = periode_terpilih_id();
        if ($proposal->periode_id != $periodeId) {
            return back()->with('error', 'Proposal bukan dari periode aktif.');
}

        return view('pages.kaprodi.revisi', compact('proposal'));
    }

    // ✅ Fungsi Proses Revisi
    public function revisi(Request $request, $id)
{
    $proposal = Proposal::findOrFail($id);
    $periodeId = periode_terpilih_id();
    if ($proposal->periode_id != $periodeId) {
        return back()->with('error', 'Proposal bukan dari periode aktif.');
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

    $proposal->update($data);
    $user = User::find(1);

    $user->notify(new ProposalStatusChanged($proposal, "Proposal '{$proposal->judul_kegiatan}' dikembalikan untuk revisi oleh Admin."));

    return redirect()->route('kaprodi.proposal.index')->with('success', 'Proposal dikembalikan ke Admin untuk revisi.');
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
    $periodeId = periode_terpilih_id();

    $users = \App\Models\User::where('prodi', $prodi)->pluck('id');

    $data = \App\Models\Keuangan::whereIn('user_id', $users)
                                ->where('periode_id', $periodeId)
                                ->latest()
                                ->get();

    return view('pages.kaprodi.keuangan', compact('data'));
}




}
