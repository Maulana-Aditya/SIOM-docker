<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_kegiatan',
        'ormawa',
        'prodi',
        'file_proposal',
        'file_proposal_pdf',
        'dibuat_oleh_user_id',
        'status',
        'current_reviewer_id',
        'file_revisi',
        'catatan_revisi',
        'ttd_pembina',
        'ttd_wr3',
        'ttd_kemahasiswaan',
        'ttd_kaprodi',
        'total_dana',  // baru
        'sisa_dana' ,   // baru
        'total_keseluruhan',
        'periode_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dibuat_oleh_user_id');
    }
    public function periode()
{
    return $this->belongsTo(\App\Models\Periode::class);
}

}
