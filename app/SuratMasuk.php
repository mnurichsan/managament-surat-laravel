<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $guarded = [];
    protected $dates = ['tgl_surat'];

    public function disposisi()
    {
        return $this->hasMany('App\Disposisi', 'id', 'id');
    }
}
