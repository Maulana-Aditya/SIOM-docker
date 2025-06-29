<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use App\Notifications\ProposalStatusChanged;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;

class PembinaProposalController extends Controller
{
    // ✅ List proposal yang masuk ke pembina
    public function index()
{
    $userOrmawa = auth()->user()->ormawa;
    $periodeId = periode_terpilih_id(); // Ambil periode aktif/terpilih

    $proposals = Proposal::where('status', 'pending_pembina')
                         ->where('ormawa', $userOrmawa)
                         ->where('periode_id', $periodeId)
                         ->get();

    return view('pages.pembina.index', compact('proposals'));
}


    public function acc($id)
{
    $proposal = Proposal::findOrFail($id);
    $periodeId = periode_terpilih_id();
    $proposal = Proposal::where('id', $id)
                        ->where('periode_id', $periodeId)
                        ->firstOrFail(); // pastikan proposal milik periode terpilih

    // Path file Word asli proposal
    $fileProposalPath = public_path($proposal->file_proposal); // file_proposal sudah relatif ke 'storage/...'

    // Load file Word dengan TemplateProcessor
    $templateProcessor = new TemplateProcessor($fileProposalPath);

    // Cari pembina berdasarkan ormawa proposal
    $pembina = User::where('roles', 'pembina')
                    ->where('ormawa', $proposal->ormawa)
                    ->first();

    if (!$pembina || !$pembina->ttd) {
        return back()->with('error', 'Tanda tangan pembina tidak tersedia.');
    }

    // Masukkan tanda tangan pembina
    $templateProcessor->setImageValue('tanda_tangan_pembina', [
        'path' => storage_path('app/public/' . $pembina->ttd),
        'width' => 150,
        'height' => 100,
        'ratio' => true,
    ]);

    // Simpan kembali file Word (overwrite)
    $templateProcessor->saveAs($fileProposalPath);

    // Konversi ke PDF menggunakan LibreOffice (Linux/Docker)
    $pdfFileName = pathinfo($fileProposalPath, PATHINFO_FILENAME) . '.pdf';
    $outputDir = storage_path('app/public/proposal');
    $pdfSavePath = $outputDir . '/' . $pdfFileName;

    $command = "libreoffice --headless --convert-to pdf \"$fileProposalPath\" --outdir \"$outputDir\"";
    exec($command, $output, $resultCode);

    if ($resultCode === 0 && file_exists($pdfSavePath)) {
        // Cari kaprodi sesuai prodi proposal
        $kaprodi = User::where('roles', 'kaprodi')
                        ->where('prodi', $proposal->prodi)
                        ->first();

        if (!$kaprodi) {
            return back()->with('error', 'Kaprodi untuk prodi tersebut tidak ditemukan.');
        }

        // Update proposal
        $proposal->update([
            'status' => 'pending_kaprodi',
            'current_reviewer_id' => $kaprodi->id,
            'file_proposal_pdf' => 'storage/proposal/' . $pdfFileName,
            'ttd_pembina' => $pembina->ttd,
        ]);

        $kaprodi->notify(new ProposalStatusChanged($proposal, "Proposal '{$proposal->judul_kegiatan}' siap ditinjau oleh Kaprodi."));

        return back()->with('success', 'Proposal berhasil ACC dan diteruskan ke Kaprodi dalam format PDF.');
    } else {
        return back()->with('error', 'Gagal mengonversi proposal ke PDF.');
    }
}
    // ✅ Fungsi tampilkan form revisi
    public function revisi(Request $request, $id)
{
    $proposal = Proposal::findOrFail($id);

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

    $proposal->update($data);

    // Kirim notifikasi ke Admin
    $user = User::find(1);

    $user->notify(new ProposalStatusChanged($proposal, "Proposal '{$proposal->judul_kegiatan}' dikembalikan untuk revisi oleh Admin."));

    return redirect()->route('pembina.proposal.index')->with('success', 'Proposal dikembalikan ke Admin untuk revisi.');
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
    $periodeId = periode_terpilih_id(); // ambil periode aktif/terpilih

    $users = \App\Models\User::where('ormawa', $ormawa)->pluck('id');

    $data = \App\Models\Keuangan::whereIn('user_id', $users)
                ->where('periode_id', $periodeId)
                ->latest()
                ->get();

    return view('pages.pembina.keuangan', compact('data'));
}


}
