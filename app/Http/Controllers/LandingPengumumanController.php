<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class LandingPengumumanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengumuman::query();

        if ($request->filled('q')) {
            $query->where('judul', 'like', '%' . $request->q . '%');
        }

        $order = $request->filter === 'terlama' ? 'asc' : 'desc';
        $pengumumans = $query->orderBy('created_at', $order)->paginate(8);

        return view('landing.pengumuman.index', compact('pengumumans'));
    }

    public function show(Pengumuman $pengumuman)
    {
        return view('landing.pengumuman.show', compact('pengumuman'));
    }
}
