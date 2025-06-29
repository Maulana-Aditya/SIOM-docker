<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Periode;

class SetPeriodeTerpilih
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('periode_terpilih')) {
            $aktif = Periode::where('is_active', true)->first();
            if ($aktif) {
                session(['periode_terpilih' => $aktif->id]);
            }
        }

        return $next($request);
    }
}

