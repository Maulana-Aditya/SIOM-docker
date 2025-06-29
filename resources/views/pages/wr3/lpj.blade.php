@extends('layouts.main')

@section('title', 'LPJ Masuk')

@section('content')
<div class="container mt-4">
    <br>
    <h3>LPJ Masuk</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Judul Kegiatan</th>
                <th>LPJ</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lpjs as $lpj)
                <tr>
                    <td>{{ $lpj->judul_kegiatan }}</td>
                    <td class="text-center">
    <a href="{{ route('lpj.viewPdf', ['id' => $lpj->id]) }}"
       class="btn btn-info btn-sm text-nowrap"
       >
        <i class="fas fa-file-pdf me-1"></i> View PDF
    </a>
</td>
                    <td>
                        <form action="{{ route('wr3.lpj.acc', $lpj->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">ACC</button>
                        </form>
                        <a href="{{ route('wr3.lpj.revisi.form', $lpj->id) }}" class="btn btn-danger btn-sm">Revisi</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada LPJ masuk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
