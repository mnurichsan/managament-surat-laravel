<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
    protected $guarded = [];

    public function detailTransport()
    {
        return $this->hasMany('App\detail_transportasi', 'id_transportasi', 'id');
    }
}
