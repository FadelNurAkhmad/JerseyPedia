<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
    'kode_pemesanan',
    'status',
    'total_harga',
    'kode_unik',
    'user_id',

    ];

    public function pesanan_details()
    {
    return $this->hasMany(PesananDetail::class, 'pesanan_id', 'id');
    }
}
