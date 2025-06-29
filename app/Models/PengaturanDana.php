<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanDana extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_awal',
        'periode_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function periode()
{
    return $this->belongsTo(\App\Models\Periode::class);
}

}
