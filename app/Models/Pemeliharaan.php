<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    protected $fillable = [
        'kategori',
        'nama_barang',
        'merek',
        'qty',
        'kondisi',
        'jenis_pemeliharaan',
        'hasil_pelaksanaan',
        'estimasi_biaya',
    ];
}
