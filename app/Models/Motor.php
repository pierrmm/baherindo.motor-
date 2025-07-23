<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $table = 'motor';
    protected $fillable = [
        'nama_motor',
        'tipe_motor',
        'tahun',
        'km',
        'harga',
        'gambar',
        'status',
    ];
}
