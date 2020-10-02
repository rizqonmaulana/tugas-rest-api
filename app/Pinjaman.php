<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $fillable = [
        'tanggal_peminjaman', 'tanggal_batas_akhir', 'tanggal_pengembalian', 'user_id', 'buku_id', 'status_ontime'
    ];

    protected $table = 'pinjaman';
}
