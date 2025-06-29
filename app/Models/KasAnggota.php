<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasAnggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'anggota_id',
        'dibuat_oleh_user_id',
        'jumlah',
        'tanggal',
        'status',
        'periode_id'
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
public function keuangan()
{
    return $this->hasOne(Keuangan::class, 'kas_anggota_id');
}
public function periode()
{
    return $this->belongsTo(\App\Models\Periode::class);
}

}
