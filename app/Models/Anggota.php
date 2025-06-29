<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nim', 'prodi', 'dibuat_oleh_user_id', 'periode_id'];

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
    public function user()
{
    return $this->belongsTo(User::class, 'dibuat_oleh_user_id');
}
public function kas()
{
    return $this->hasMany(KasAnggota::class, 'anggota_id');
}

public function keuangan()
{
    return $this->hasMany(Keuangan::class, 'anggota_id');
}
public function periode()
{
    return $this->belongsTo(\App\Models\Periode::class);
}


}
