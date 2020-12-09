<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $guarded = [];
    protected $dates = ['batas_waktu'];

    public function suratMasuk()
    {
        return $this->hasMany('App\SuratMasuk', 'id_surat', 'id');
    }
}
