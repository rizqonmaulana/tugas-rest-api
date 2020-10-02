<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = [
        'kode_buku', 'judul', 'pengarang', 'tahun_terbit'
    ];

    protected $table = 'buku';

    public function pinjaman(){
        return $this->belongsToMany('App\User', 'pinjaman');
    }
}
