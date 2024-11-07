<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sheet1 extends Model
{
    protected $fillable = [
        'no',
        'nama_barang',
        'merk_spesifikasi',
        'qty',
        'harga_pasaran',
        'jumlah',
        'status',
    ];
}
