<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function index()
    {
        $periodes = Periode::latest()->get();
        return view('pages.admin.periode.index', compact('periodes'));
    }

    public function create()
    {
        return view('pages.admin.periode.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:periodes,nama',
        ]);

        Periode::create($request->only('nama'));

        return redirect()->route('admin.periode.index')->with('success', 'Periode berhasil ditambahkan.');
    }

    public function setAktif($id)
    {
        Periode::query()->update(['is_active' => false]);
        Periode::findOrFail($id)->update(['is_active' => true]);

        return redirect()->back()->with('success', 'Periode berhasil diaktifkan.');
    }

    public function destroy($id)
    {
        Periode::destroy($id);
        return redirect()->back()->with('success', 'Periode berhasil dihapus.');
    }
}

