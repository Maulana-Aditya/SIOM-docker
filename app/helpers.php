<?php
use App\Models\Periode;

function periode_terpilih_id() {
    return session('periode_terpilih') ?? Periode::where('is_active', true)->first()?->id;
}
