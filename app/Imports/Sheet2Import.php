<?php

namespace App\Imports;

use App\Models\Sheet2;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Sheet2Import implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
public function model(array $row)
    {

        return new Sheet2([
            'no' => $row['no'],
            'nama_barang' => $row['nama_barang'] ?? null,
            'merek' => $row['merek'] ?? null,
            'qty' => $row['qty'] ?? null,
            'kondisi' => $row['kondisi'] ?? null,
            'keterangan' => $row['keterangan'] ?? null,
        ]);
    }
}