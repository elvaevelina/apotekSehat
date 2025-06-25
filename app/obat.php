<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    protected $table = 'obat';
    protected $fillable = [
        'nama',
        'bentuk',
        'harga_obat',
        'stok_obat',
        'produsen',
        'tgl_kadaluarsa'
    ];

}
