@extends('layouts.main')
@section('title', 'Kelola Dana Ormawa')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Kelola Dana Ormawa</h1>
    </div>

    <div class="section-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>Nama Ormawa</th>
                        <th>Total Dana Awal (Rp)</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengaturanDanas as $dana)
                        <tr>
                            <td>{{ $dana->user->name }}</td>
                            <td>Rp {{ number_format($dana->total_awal, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('admin.ormawa.dana.update', $dana->id) }}" method="POST" class="d-flex">
                                    @csrf
                                    <input type="number" name="total_awal" value="{{ $dana->total_awal }}" class="form-control me-2" required>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
