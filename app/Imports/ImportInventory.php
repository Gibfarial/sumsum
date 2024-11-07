<?php

namespace App\Imports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportInventory implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Inventory([
            'no' => $row['no'],
            'kategori' => $row['kategori'],       // Kolom kategori
            'nama_barang' => $row['nama_barang'], // Kolom nama_barang
            'merek' => $row['merek'],             // Kolom merek
            'qty' => $row['qty'],                 // Kolom qty
            'kondisi' => $row['kondisi'],         // Kolom kondisi
        ]);
    }
}
