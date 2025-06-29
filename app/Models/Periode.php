<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $fillable = ['nama', 'is_active'];

    public static function aktif()
    {
        return static::where('is_active', true)->first();
    }
}

