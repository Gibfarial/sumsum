<?php

namespace App\Imports;

use App\Models\Pemeliharaan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class PemeliharaanImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    public function model(array $row)
    {
        return new Pemeliharaan([
            'no' => $row['no'],
            'kategori' => $row['kategori'] ?? null,
            'nama_barang' => $row['nama_barang'] ?? null,
            'merek' => $row['merek'] ?? null,
            'qty' => $row['qty'] ?? null,
            'kondisi' => $row['kondisi'] ?? null, // Baik / Rusak
            'jenis_pemeliharaan' => $row['jenis_pemeliharaan'] ?? null,
            'hasil_pelaksanaan' => $row['hasil_pelaksanaan'] ?? null,
            'estimasi_biaya' => $row['estimasi_biaya'] ?? null,
        ]);
    }

    public function headingRow(): int
    {
        return 1; // Mengambil heading dari baris pertama
    }
}