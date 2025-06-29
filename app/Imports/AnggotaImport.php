<?php

namespace App\Imports;

use App\Models\Anggota;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AnggotaImport implements OnEachRow, WithHeadingRow
{
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function onRow(Row $row)
    {
        $row = $row->toArray();

        Anggota::create([
            'nama' => $row['nama'],
            'nim' => $row['nim'],
            'prodi' => $row['prodi'],
            'dibuat_oleh_user_id' => $this->userId,
        ]);
    }
}
