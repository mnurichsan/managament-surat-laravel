<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_transportasi extends Model
{
    protected $guarded = [];
    public function penumpang()
    {
        return $this->belongsTo('App\Penumpang', 'id_transportasi', 'id');
    }
}
