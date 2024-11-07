<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sheet2 extends Model
{
    protected $fillable = [
        'no',
        'nama_barang',
        'merek',
        'qty',
        'kondisi',
        'keterangan',
    ];
}
