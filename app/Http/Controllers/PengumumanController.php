<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::latest()->get();
        return view('pages.admin.pengumuman.index', compact('pengumumans'));
    }

    public function create()
    {
        return view('pages.admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png',
        ]);

        $filePath = null;

        if ($request->hasFile('file')) {
            $storedPath = $request->file('file')->store('public/pengumuman');
            $filePath = str_replace('public/', '', $storedPath); // hasil: pengumuman/namafile.pdf
        }

        Pengumuman::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $filePath,
        ]);

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function show(Pengumuman $pengumuman)
    {
        return view('pages.admin.pengumuman.show', compact('pengumuman'));
    }

    public function edit(Pengumuman $pengumuman)
    {
        return view('pages.admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png',
        ]);

        if ($request->hasFile('file')) {
            if ($pengumuman->file_path) {
                Storage::delete('public/' . $pengumuman->file_path);
            }

            $storedPath = $request->file('file')->store('public/pengumuman');
            $pengumuman->file_path = str_replace('public/', '', $storedPath);
        }

        $pengumuman->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $pengumuman->file_path,
        ]);

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        if ($pengumuman->file_path) {
            Storage::delete('public/' . $pengumuman->file_path);
        }

        $pengumuman->delete();
        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dihapus.');
    }
}
