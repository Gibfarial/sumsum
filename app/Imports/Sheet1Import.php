<?php

namespace App\Imports;

use App\Models\Sheet1;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class Sheet1Import implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $hargaJumlah = $row['harga_pasaran'] * $row['qty'];
        return new Sheet1([
            'no' => $row['no'],
            'nama_barang' => $row['nama_barang'],
            'merk_spesifikasi' => $row['merk_spesifikasi'],
            'qty' => $row['qty'],
            'harga_pasaran' => $row['harga_pasaran'],
            'jumlah' => $hargaJumlah, // Set nilai jumlah
            'status' => $row['status'],
        ]);
    }
}


class Import implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Sheet1' => new Sheet1Import(), // Hanya mengimpor dari Sheet1
        ];
    }
}
