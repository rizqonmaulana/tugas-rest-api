<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{

    protected $fillable = [
        'nama_lengkap', 'nim', 'fakultas', 'jurusan', 'no_hp', 'no_wa', 'user_id'
    ];

    protected $table = 'mahasiswa';

    public function buku(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
