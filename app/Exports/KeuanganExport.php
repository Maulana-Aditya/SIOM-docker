<?php

namespace App\Exports;

use App\Models\Keuangan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KeuanganExport implements FromView
{
    protected $userId;
    public function __construct($userId) { $this->userId = $userId; }

    public function view(): View
    {
        return view('exports.keuangan', [
            'data' => Keuangan::where('user_id', $this->userId)->get()
        ]);
    }
}
