@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
        <h4 class="mb-0">Proposal yang Saya Ajukan</h4>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Preview Proposal PDF</h5>

                <iframe src="{{ $filePath }}" width="100%" height="600px" style="border: 1px solid #ccc;"></iframe>

                <div class="mt-3">
                    <a href="{{ route('proposal.download', ['id' => $proposal->id]) }}" class="btn btn-primary">
                        Unduh file
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
