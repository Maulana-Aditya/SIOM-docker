<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LPJ extends Model
{
    use HasFactory;

    protected $table = 'lpjs';

    protected $fillable = [
        'judul_kegiatan',
        'ormawa',
        'prodi',
        'file_lpj',
        'file_lpj_pdf',
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
        'dokumentasi_paths', 
        'nota_paths',
        'periode_id'
    ];
    protected $casts = [
    'dokumentasi_paths' => 'array', // Otomatis konversi JSON → array PHP
    'nota_paths' => 'array',
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
