@extends('layouts.main')

@section('title', 'Edit Dana Proposal')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Dana Proposal</h1>
    </div>

    <div class="section-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Edit Sisa Dana untuk: {{ $proposal->judul_kegiatan }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.updateDana', $proposal->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Total Dana (Rp)</label>
                        <input type="text" value="Rp {{ number_format($proposal->total_dana, 0, ',', '.') }}" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Input Sisa Dana (Rp)</label>
                        <input type="number" name="sisa_dana" value="{{ $proposal->sisa_dana }}" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.aturDana') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
