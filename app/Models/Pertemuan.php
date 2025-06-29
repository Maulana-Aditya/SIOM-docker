<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    protected $fillable = ['tanggal', 'pokok_bahasan', 'sub_pokok_bahasan', 'dibuat_oleh_user_id', 'dokumentasi', 'periode_id'];



public function absensi()
{
    return $this->hasMany(Absensi::class);
}
public function user()
{
    return $this->belongsTo(User::class, 'dibuat_oleh_user_id');
}
public function periode()
{
    return $this->belongsTo(\App\Models\Periode::class);
}


}
