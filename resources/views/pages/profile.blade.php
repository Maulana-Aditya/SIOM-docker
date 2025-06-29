@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <div class="section">
        <div class="section-body">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-6 col-lg-6">
                    @include('partials.alert')
                    <div class="card profile-widget">
                        @if (Auth::user()->roles == 'pembina')
                        <div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <h5 class="card-title mb-3">Upload Tanda Tangan Pembina</h5>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (auth()->user()->ttd)
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanda Tangan Saat Ini:</label><br>
                <img src="{{ asset('storage/' . auth()->user()->ttd) . '?v=' . time() }}" alt="Tanda Tangan" height="100">
            </div>
        @endif

        <form action="{{ route('pembina.uploadTtd') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="ttd" class="form-label">Upload File PNG</label>
                <input type="file" name="ttd" class="form-control" accept="image/png" required>
                <small class="text-muted">Ukuran maks 2MB. Format PNG.</small>
            </div>
            <button type="submit" class="btn btn-success">Simpan Tanda Tangan</button>
        </form>
    </div>
</div>

<div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-header d-flex justify-content-between">
                                            <h4>Edit Profile</h4>
                                            <a href="{{ route('ubah-password') }}" class="btn btn-primary"><i
                                                    class="nav-icon fas fa-lock"></i>&nbsp; Ubah password</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Nama</label>
                                                    <input name="nama" type="text" class="form-control"
                                                        value="{{ $pembina->nama ?? '' }}" required>
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label>NIP</label>
                                                    <input name="nip" type="text" class="form-control"
                                                        value="{{ $pembina->nip ?? '' }}" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Email</label>
                                                    <input name="email" type="email" class="form-control"
                                                        value="{{ auth()->user()->email ?? '' }}" required="">
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label>No. Telp</label>
                                                    <input name="no_telp" type="tel" class="form-control"
                                                        value="{{ $pembina->no_telp ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label>Alamat</label>
                                                    <textarea name="alamat" class="form-control">{{ $pembina->alamat ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        @elseif (Auth::user()->roles == 'siswa')
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <form action="{{ route('update.profile') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-header d-flex justify-content-between">
                                            <h4>Edit Profile</h4>
                                            <a href="{{ route('ubah-password') }}" class="btn btn-primary"><i
                                                    class="nav-icon fas fa-lock"></i>&nbsp; Ubah password</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Nama</label>
                                                    <input name="nama" type="text" class="form-control"
                                                        value="{{ $siswa->nama ?? '' }}" required>
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label>NIS</label>
                                                    <input name="nis" type="text" class="form-control"
                                                        value="{{ $siswa->nis ?? '' }}" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Email</label>
                                                    <input name="email" type="email" class="form-control"
                                                        value="{{ auth()->user()->email ?? '' }}" required="">
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label>No. Telp</label>
                                                    <input name="telp" type="tel" class="form-control"
                                                        value="{{ $siswa->telp ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label>Alamat</label>
                                                    <textarea name="alamat" class="form-control">{{ $siswa->alamat ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @elseif(auth()->user()->roles == 'kaprodi')
                        <div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <h5 class="card-title mb-3">Upload Tanda Tangan Kaprodi</h5>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (auth()->user()->ttd)
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanda Tangan Saat Ini:</label><br>
                <img src="{{ asset('storage/' . auth()->user()->ttd) . '?v=' . time() }}" alt="Tanda Tangan" height="100">
            </div>
        @endif

        <form action="{{ route('kaprodi.uploadTtd') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="ttd" class="form-label">Upload File PNG</label>
                <input type="file" name="ttd" class="form-control" accept="image/png" required>
                <small class="text-muted">Ukuran maks 2MB. Format PNG.</small>
            </div>
            <button type="submit" class="btn btn-success">Simpan Tanda Tangan</button>
        </form>
    </div>
</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
