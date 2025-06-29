<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    
    protected $fillable = ['pertemuan_id', 'anggota_id', 'status', 'periode_id'];

public function anggota()
{
    return $this->belongsTo(Anggota::class);
}

public function pertemuan()
{
    return $this->belongsTo(Pertemuan::class);
}
public function periode()
{
    return $this->belongsTo(\App\Models\Periode::class);
}

}
