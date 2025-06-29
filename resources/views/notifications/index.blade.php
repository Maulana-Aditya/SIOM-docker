@extends('layouts.main') {{-- atau layouts.auth, sesuai kebutuhan --}}

@section('content')
<div class="container py-4">
    <h3>Notifikasi Saya</h3>

    @forelse($notifications as $notif)
        <div class="card mb-2 {{ $notif->read_at ? 'bg-light' : '' }}">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    {{ $notif->data['message'] }}
                    <br>
                    <small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
                </div>

                <div>
                    <a href="{{ $notif->data['link'] }}" class="btn btn-sm btn-primary">Lihat</a>

                    @if(! $notif->read_at)
                        <form method="POST" action="{{ route('notifications.read', $notif->id) }}" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-secondary">Tandai Dibaca</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <p>Tidak ada notifikasi.</p>
    @endforelse

    {{ $notifications->links() }}
</div>
@endsection
