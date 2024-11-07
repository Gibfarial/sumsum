<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

    protected $table =  'inventories';
    protected $fillable = [
        'no',
        'kategori',
        'nama_barang',
        'merek',
        'qty',
        'kondisi',
    ];
}
