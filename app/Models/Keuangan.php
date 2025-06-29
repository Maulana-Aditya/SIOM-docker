<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'jenis', 'keterangan', 'tanggal', 'jumlah', 'kas_anggota_id', 'periode_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function anggota()
{
    return $this->belongsTo(Anggota::class);
}
public function kasAnggota()
{
    return $this->belongsTo(KasAnggota::class, 'kas_anggota_id');
}
public function periode()
{
    return $this->belongsTo(\App\Models\Periode::class);
}

}
